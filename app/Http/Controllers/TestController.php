<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Order;

class TestController extends Controller
{
    public function index(Request $request){
    	//return request()->is('test');
    	return Route::getCurrentRoute()->uri;
    }
}
