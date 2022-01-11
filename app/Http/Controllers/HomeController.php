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
        $cat1 = 'Detergents';
        $cat2 = 'Spices';
        $cat3 = 'Health & Beauty';
        $products = Product::with('categories')->whereHas('categories',function($query){
            $query->where('name',$cat1)->where([['featured',true],['available',1]]);
        })->get();
        $section2 = Product::with('categories')->whereHas('categories',function($query){
            $query->where('name',$cat2)->where([['featured',true],['available',1]]);
        })->get();
        $section2 = Product::with('categories')->whereHas('categories',function($query){
            $query->where('name',$cat3)->where([['featured',true],['available',1]]);
        })->get();
        return view('index')->with(['products' => $products,'category' => $cat1]);
    }

    public function switchuser(Request $request){
        $user = User::find($request->id);
        $user->role_id = ($user->role_id == 2) ? 3 : 2;
        $user->save();
        //$user = 
        return redirect()->back();
    }
}
