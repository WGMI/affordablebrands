<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

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
}
