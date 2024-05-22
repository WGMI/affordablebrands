<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\User;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function index()
    {
        $featured = Product::all()->take(8);
        return view('index')->with(['products' => $featured]);
    }

    public function switchuser(Request $request){
        $user = User::find($request->id);
        if($user->outlet_code == null){
            return redirect()->back()->with('error','fail');
        }else{
            $user->role_id = ($user->role_id == 2) ? 3 : 2;
            $user->save();
            //$user = 
            return redirect()->back();
        }
    }
}
