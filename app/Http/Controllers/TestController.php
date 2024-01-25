<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use App\Order;
use App\Category;
use App\SubCategory;
use Cart;

class TestController extends Controller
{
    public function index(){
        $recipientName = 'Test';
        return view('emails.millet_quest_email',compact('recipientName'));
        $o = auth()->user()->orders;
        foreach($o as $os){
            echo $os->products;
        }
    }

    public function testmpesa(){
    	$key = "3NjcYEAA8rfBAoIOZRZrT8Nq35tenGc7";
        $secret = "YxpQ7FTVXvP6AGN2";
        $businessCode = "174379";
        $passKey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
        $callback = url("api/callback");

        $phone_number = "254708627024";
        $accountRef = "qikapu";
        $desc = "test";
        $amount = "1";
        $timestamp = date('YmdHis');    
        $password = base64_encode($businessCode.$passKey.$timestamp);

        $headers = ['Content-Type:application/json; charset=utf8'];
        
        $access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        $initiate_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

        $curl = curl_init($access_token_url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_HEADER, FALSE);
        curl_setopt($curl, CURLOPT_USERPWD, $key.':'.$secret);
        $result = curl_exec($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $result = json_decode($result);
        $access_token = $result->access_token;  
        curl_close($curl);

        $stkheader = ['Content-Type:application/json','Authorization:Bearer '.$access_token];

        $curl_post_data = array(
            'BusinessShortCode' => $businessCode,
            'Amount' => $amount,
            'Password' => $password,
            'Timestamp' => $timestamp,
            'TransactionType' => 'CustomerPayBillOnline',
            'PartyA' => $phone_number,
            'PartyB' => $businessCode,
            'PhoneNumber' => $phone_number,
            'CallBackURL' => $callback,
            'AccountReference' => $accountRef,
            'TransactionDesc' => $desc  
        );
        $data_string = json_encode($curl_post_data);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $initiate_url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $stkheader);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($curl, CURLOPT_POST, true);
        
        $curl_response = curl_exec($curl);
        Log::info($curl_response);

        Log::info($curl_response);
    }

    public function callback(){
        header("Content-Type: application/json");
        Log::info("Callback begins");

        $response = '{
        "ResultCode": 0, 
        "ResultDesc": "Confirmation Received Successfully"
        }';

        // DATA
        $mpesaResponse = file_get_contents('php://input');

        Log::info($mpesaResponse);
        Log::info($response);
    }
}
