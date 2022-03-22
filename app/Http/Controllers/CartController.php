<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
//use \Gloudemans\Shoppingcart\facades\Cart;
use Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->qty > $request->productqty){
            return redirect()->back()->with('error','Only '.$request->productqty.' unit(s) remaining.');
        } else{
            $product = Product::find($request->id);
            Cart::add($request->id, $request->name, $request->qty, $product->price)->associate('App\Product');
            if($request->route()->uri == 'cartsingle'){
                return redirect()->back()->with('success','Item added to cart!');
            } else{
                return null;
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        Cart::update($id,$request->quantity);
        return redirect()->back()->with('success','Quantity updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return back()->with('success','Item Removed');
    }
}
