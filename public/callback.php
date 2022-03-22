<?php
    $callbackResponse = file_get_contents('php://input');
    $logfile = 'callback.txt';
    $log = fopen($logfile,"a");
    fwrite($log,$callbackResponse);
    fclose($log);
?>