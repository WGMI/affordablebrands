<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Gloudemans\Shoppingcart\facades\Cart;
use App\Order;
use App\OrderProduct;
use App\Product;

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
            'phone'=>'required'
            ],
            ['email.unique' => 'An account with this email exists. Please sign in if it is yours.']
        );

        //Handle payment

        //Insert into orders
        $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'email' => $request->email,
            'county' => $request->county,
            'city' => $request->city,
            'street' => $request->street,
            'zip' => $request->zip,
            'phone' => $request->phone,
            'payment' => $request->payment
        ]);

        //Insert into order_product
        foreach(Cart::content() as $item){
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty
            ]);
        }

        //Decrease quntity of products in table
        $this->decreaseQuantities();

        Cart::instance('default')->destroy();
        //dd($request);
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