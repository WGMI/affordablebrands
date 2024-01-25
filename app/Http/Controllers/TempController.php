<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TempController extends Controller
{
    public function sendEmail(Request $request){
        $recipientName = $request->name; // Replace with the recipient's name

        Mail::to($request->email)->send(new MilletQuestEmail($recipientName));

        return "Email sent successfully!";
    }
}
