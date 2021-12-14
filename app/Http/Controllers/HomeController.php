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
        $products = Product::with('categories')->whereHas('categories',function($query){
            $query->where('name','Electronics')->where([['featured',true],['available',1]]);
        })->get();
        return view('index')->with('products',$products);
    }

    public function switchuser(Request $request){
        $user = User::find($request->id);
        $user->role_id = ($user->role_id == 2) ? 3 : 2;
        $user->save();
        //$user = 
        return redirect()->back();
    }
}
