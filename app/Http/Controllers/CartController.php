<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.cart');
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
        if(Auth::id()){


            $price=Product::find($request->id);
            if ($cart = Cart::where('user_id',auth()->user()->id)->Where('product_id', $request->id)->first()) {
                        $cart->quantity =  $cart->quantity + $request->quantity;
                        $cart->sub_total = $cart->sub_total + (($request->quantity) * ($price->regular_price??0));
                        $subtotal = Cart::where('user_id', auth()->user()->id)->pluck('sub_total')->sum();
                        $cart->total += $subtotal;
                        $cart->update();
                         return redirect()->back();
                 }
                 else{
                     $cart = new Cart();
                     $cart->user_id = auth()->user()->id;
                     $cart->product_id = $request->id;
                     $cart->price= $price->regular_price?? 0;
                    $cart->quantity = $request->quantity;
                    $cart->sub_total = ($request->quantity) * ($price->regular_price??0);
                    $cart->total =  $cart->sub_total;
                    $cart->save();
                    return redirect(url()->previous()."#$request->product_id");
                 }
                }
                 else {
                    return redirect()->route('login')->withFailure(__('You must login to purchase this product'));


        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
