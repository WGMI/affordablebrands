<?php
    header('Content-Type: application/json');
    $response ='{
        "ResultCode": 0,
        "ResultDesc" : "Confirmation Received Successfully"
    }';
    $mpesaResponse = file_get_contents('php://input');
    
    $logfile = 'MpesaValidation.txt';
    $jsonMpesa = json_decode($mpesaResponse,true);
    //write
    $log = fopen($logfile,"a");
    fwrite($log,$mpesaResponse);
    fclose($log);
    echo $response;
?>