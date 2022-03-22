<?php
    $servername = "localhost";
    $username = "debug";
    $password = "123456";
    $dbname = "shop";

    header('Content-Type: application/json');
    $response ='{
        "ResultCode": 0,
        "ResultDesc" : "Confirmation Received Successfully"
    }';
    $mpesaResponse = file_get_contents('php://input');
    
    $logfile = 'MpesaConfirmation.txt';
    $jsonMpesa = json_decode($mpesaResponse,true);
   
    $log = fopen($logfile,"a");
    fwrite($log,$mpesaResponse);
    fclose($log);
     
        
        $content=json_decode($mpesaResponse);
        
        
        // Create connection
$conn = new mysqli($servername, 
    $username, $password, $dbname);
  
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " 
        . $conn->connect_error);
}
  
$sql = "INSERT INTO mpesa_transactions(TransactionType,TransID,TransTime,TransAmount,BusinessShortCode,BillRefNumber,InvoiceNumber,OrgAccountBalance,ThirdPartyTransID,MSISDN,FirstName,MiddleName,LastName)
        VALUES ('$content->TransactionType','$content->TransID','$content->TransTime','$content->TransAmount','$content->BusinessShortCode','$content->BillRefNumber','$content->InvoiceNumber','$content->OrgAccountBalance','$content->ThirdPartyTransID','$content->MSISDN','$content->FirstName','$content->MiddleName','$content->LastName')";


if ($conn->query($sql) === TRUE) {
    echo "record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


        
?>