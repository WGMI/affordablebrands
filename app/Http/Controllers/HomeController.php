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
            $query->where('name','Detergents')->where([['featured',true],['available',1]]);
        })->get();
        $section2 = Product::with('categories')->whereHas('categories',function($query){
            $query->where('name','Spices')->where([['featured',true],['available',1]]);
        })->get();
        $section3 = Product::with('categories')->whereHas('categories',function($query){
            $query->where('name','Health & Beauty')->where([['featured',true],['available',1]]);
        })->get();
        return view('index')->with(['products' => $products,'section2' => $section2,'section3' => $section3,'category' => $cat1]);
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
