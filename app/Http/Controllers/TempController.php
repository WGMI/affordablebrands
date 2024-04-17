<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MLTEmail;
use App\Mail\SecondEmail;
use App\Mail\ThirdEmail;

class TempController extends Controller
{
    public function sendEmail(Request $request){
        $recipientName = $request->name; // Replace with the recipient's name

        Mail::to($request->email)->send(new MLTEmail($recipientName));

        return "Email sent successfully!";
    }

    public function sendSecondEmail(Request $request){
        $recipientName = $request->name; // Replace with the recipient's name

        Mail::to($request->email)->send(new SecondEmail($recipientName));

        return "Email sent successfully!";
    }

    public function sendThirdEmail(Request $request){
        $recipientName = $request->name; // Replace with the recipient's name

        Mail::to($request->email)->send(new ThirdEmail($recipientName));

        return "Email sent successfully!";
    }
}
