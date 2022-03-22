<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Cart;
use Illuminate\Support\Facades\Mail;
use App\Order;
use App\OrderProduct;
use App\Product;
use App\Mail\OrderPlaced;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Cart::count() == 0){
            return redirect()->route('shop.index');
        }

        if(auth()->user() && request()->is('guestcheckout')){
            return redirect('checkout');
        }

        return view('checkout');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function mpesaRegisterUrls()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://api.safaricom.co.ke/mpesa/c2b/v1/registerurl');
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization: Bearer '. $this->generateAccessToken()));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode(array(
            'ShortCode' => env("SHORTCODE"),
            'ResponseType' => 'Completed',
            'ConfirmationURL' => "http://134.122.105.210/confirmation.php",
            'ValidationURL' => "http://134.122.105.210/validation.php"
        )));
        $curl_response = curl_exec($curl);
        echo $curl_response;
    }

        public function generateAccessToken()
    {
        $consumer_key=env("MPESA_CONSUMER_KEY");
        $consumer_secret=env("MPESA_CONSUMER_SECRET");
        $credentials = base64_encode($consumer_key.":".$consumer_secret);
        $url = 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        $credentials = base64_encode($consumer_key.':'.$consumer_secret);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $curl_response = curl_exec($curl);

        return json_decode($curl_response)->access_token;
    }

    public function store(Request $request)
    {
        //Ensure items are still available
        if($this->checkAvailability()){
            return redirect()->back()->with('error','Sorry. An item in your cart is no longer available.');
        }

        $contents = Cart::content()->map(function ($item){
            return $item->model->slug.', '.$item->qty;
        })->values()->toJson();

        $emailvalidation = auth()->user() ? 'required | email' : 'required | email | unique:users';

        $data = $request->validate([
            'name'=>'required',
            'email'=> $emailvalidation,
            'county'=>'required',
            'city'=>'required',
            'street'=>'required',
            //'phone'=>'required | digits:10 | regex:/(07)[0-9]{8}/'
        ],
            [
                'email.unique' => 'An account with this email exists. Please sign in if it is yours.'
            ]
        );

        //Insert into 

        $type = (auth()->user()->role_id == 3) ? 'Wholesale' : 'Retail' ;
        $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'email' => $request->email,
            'county' => $request->county,
            'city' => $request->city,
            'street' => $request->street,
            'zip' => $request->zip,
            'phone' => $request->phone,
            'payment' => $request->payment,
            'type' => $type,
        ]);
        
        $amount = 0;
        
        //Insert into order_product
        foreach(Cart::content() as $item){
            $amount += $item->price;
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty
            ]);
        }

        if($request->payment == 'mrn'){
            //return $this->mpesaRegisterUrls();
            //return $this->generateAccessToken();


            
                    $LipaNaMpesaPasskey = env("PASSKEY");
                    $BusinessShortCode = env("SHORTCODE");
                    $PartyB = env("SHORTCODE");
               
                
                
                
                
               //$PartyB = 5483375;
               $lipa_time = Carbon::rawParse('now')->format('YmdHms');
                $Amount =$amount;
                $PartyA = $request->phone;
                
                $TransactionType = 'CustomerPayBillOnline';
                
                if(!empty($request->input('accountnumber'))){
                     $accountref = $request->input('accountnumber'); 
                }else{
                     $accountref = 0 ;
                }
               
                
                $PhoneNumber = $request->phone;
                //return $PhoneNumber;
                $CallBackURL = "http://134.122.105.210/callback.php";
                $AccountReference = $accountref;
                $TransactionDesc ='success';
                $Remarks = 'Payment to account';
                $timestamp='20'.date(    "ymdhis");
                $Msisdn ="254708374149";
                
                $password=base64_encode($BusinessShortCode.$LipaNaMpesaPasskey.$timestamp);
               
                try {
                    //$mpesa= new \Safaricom\Mpesa\Mpesa();
                        $mpesa= new \Safaricom\Mpesa\Mpesa();
                    //return $stkPushSimulation=;
                    $mpesa->STKPushSimulation($BusinessShortCode, $LipaNaMpesaPasskey, $TransactionType, $Amount, $PartyA, $PartyB, $PhoneNumber, $CallBackURL, $AccountReference, $TransactionDesc, $Remarks);
                    //return $stkPushSimulation;
                    $data       = array(
                        'status' => 200,
                        'message' => 'Unlock Your Phone Then Proceed To Make Payments',
                        'state' => 'success'
                    );
                    //header("Content-type: application/json");
                    //echo json_encode($data);
                    //Mail::to($order->email)->send(new OrderPlaced($order,$order->products(),$amount));
                    $this->decreaseQuantities();

                    Cart::instance('default')->destroy();
                    return view('thankyou');
                } catch (\Exception $e) {
                    //return report($e);
                    $data       = array(
                        'status' => 400,
                        'message' => $e->getMessage(),
                        'state' => 'error'
                    );
                    header("Content-type: application/json");
                   // echo json_encode($data);
                
                    //exit();
                }


            //$mpesacontroller = new MpesaController();
            //$mpesacontroller->express($request->phone,$amount);
        }else{
            Mail::to($order->email)->send(new OrderPlaced($order,$order->products(),$amount));

            //Decrease quntity of products in table
            $this->decreaseQuantities();

            Cart::instance('default')->destroy();
            return view('thankyou');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function checkAvailability(){
        foreach (Cart::content() as $item){
            $product = Product::find($item->model->id);
            if($product->quantity < $item->qty){
                return true;
            }
        }

        return false;
    }

    protected function decreaseQuantities(){
        foreach (Cart::content() as $item){
            $product = Product::find($item->model->id);
            $product->update(['quantity' => $product->quantity - $item->qty]);
        }
    }

    public function messages(){
        return [
            'email.unique' => 'An account with this email exists. Please sign in if it is yours'
        ];
    }
}
