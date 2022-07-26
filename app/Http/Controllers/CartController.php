<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;



class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try {
            //GET
            if (Auth::id()) {
                $cartItems = Cart::orderBy('carts.id', 'ASC')
                    ->where('user_id', auth()->user()->id)
                    ->join('users', 'carts.user_id', '=', 'users.id')
                    ->join('products', 'carts.product_id', '=', 'products.id')
                    ->get([
                        'carts.id', 'carts.sub_total', 'carts.quantity', 'products.image',
                        'products.name', 'products.sale_price', 'products.regular_price'
                    ]);
                // dd($cartItems);
                $total = Cart::where('user_id', auth()->user()->id)->pluck('sub_total')->sum();
                return view('pages.cart', compact('cartItems', 'total'));
            } else {
                return redirect()->route('login')->withFailure(__('You must login to see this page'));
            }
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        };

        return view('pages.cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::id()) {


            $price = Product::find($request->id);
            if ($cart = Cart::where('user_id', auth()->user()->id)->Where('product_id', $request->id)->first()) {
                $cart->quantity =  $cart->quantity + $request->quantity;
                if ($price->sale_price !== null) {
                    $cart->sub_total = $cart->sub_total + (($request->quantity) * ($price->sale_price ?? 0));
                } else {
                    $cart->sub_total = $cart->sub_total + (($request->quantity) * ($price->regular_price ?? 0));
                }
                $subtotal = Cart::where('user_id', auth()->user()->id)->pluck('sub_total')->sum();
                // $cart->total += $subtotal;
                $cart->update();
                return redirect()->back();
            } else {
                $cart = new Cart();
                $cart->user_id = auth()->user()->id;
                $cart->product_id = $request->id;
                $cart->quantity = $request->quantity;
                if ($price->sale_price !== null) {
                    $cart->price = $price->sale_price ?? 0;
                    $cart->sub_total = ($request->quantity) * ($price->sale_price ?? 0);
                } else {

                    $cart->price = $price->regular_price ?? 0;
                    $cart->sub_total = ($request->quantity) * ($price->regular_price ?? 0);
                }


                $cart->save();
                return redirect(url()->previous() . "#$request->product_id");
            }
        } else {
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



    public function checkout(Request $request)
    {
        try {
            //GET

            if (Auth::id()) {


                    $cartItems = Cart::orderBy('carts.id', 'ASC')
                        ->where('user_id', auth()->user()->id)
                        ->join('users', 'carts.user_id', '=', 'users.id')
                        ->join('products', 'carts.product_id', '=', 'products.id')
                        ->get([
                            'carts.sub_total', 'carts.quantity', 'products.image',
                            'products.name','products.regular_price','products.sale_price','products.id'
                        ]);



                // dd($cartItems);
                $total = Cart::where('user_id', auth()->user()->id)->pluck('sub_total')->sum();
                return view('pages.checkout', compact('cartItems', 'total'));
            } else {
                return redirect()->route('login')->withFailure(__('You must login to see this page'));
            }
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        };

        return view('pages.checkout');
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

        $cart->quantity =  $request->quantity;
        $cart->sub_total = (($cart->quantity) * ($cart->price));

        $cart->update();
        return redirect()->route('cart.index')->with('message', 'category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->back()
            ->with('message', 'item deleted successfully');
    }
}
