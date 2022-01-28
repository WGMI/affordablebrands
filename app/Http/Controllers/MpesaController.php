<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\MpesaProcess;
use App\MpesaTransaction;

class MpesaController extends Controller
{
    public function express($number,$amount_to_pay){
        $key = "3NjcYEAA8rfBAoIOZRZrT8Nq35tenGc7";
        $secret = "YxpQ7FTVXvP6AGN2";
        $businessCode = "174379";
        $passKey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
        $callback = url("callback");

        $phone_number = '254' . ltrim($number, $number[0]);
        $accountRef = "qikapu";
        $desc = "Qikapu payment";
        $amount = $amount_to_pay;
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
        
        $response = json_encode(curl_exec($curl));
        $error = curl_error($curl);
        curl_close($curl);

        Log::info("Express process ends.");

        if ($error) {
            Log::info("Error in express process.");
            return ['status' => 'error', 'data' => $error];
        } else {
            Log::info("Successful express process.");
            $json = json_decode(json_decode($response));

            MpesaProcess::create([
                'MerchantRequestID' => $json->MerchantRequestID,
                'CheckoutRequestID' => $json->CheckoutRequestID
            ]);
            //return ['status' => 'success', 'data' => $json->CustomerMessage];
            return view('thankyou');
        }
    }

    public function callback(Request $request){
        $content = json_decode($request->getContent());
        Log::info($content);

        $mpesa_transaction = new MpesaTransaction();
        $mpesa_transaction->TransactionType = $content->TransactionType;
        $mpesa_transaction->TransID = $content->TransID;
        $mpesa_transaction->TransTime = $content->TransTime;
        $mpesa_transaction->TransAmount = $content->TransAmount;
        $mpesa_transaction->BillRefNumber = $content->BillRefNumber;
        $mpesa_transaction->ThirdPartyTransID = $content->ThirdPartyTransID;
        $mpesa_transaction->MSISDN = $content->MSISDN;
        $mpesa_transaction->FirstName = $content->FirstName;
        $mpesa_transaction->MiddleName = $content->MiddleName;
        $mpesa_transaction->LastName = $content->LastName;
        $mpesa_transaction->save();
    }
}
