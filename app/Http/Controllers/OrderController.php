<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::id()) {
            $user = Cart::where('user_id', auth()->user()->id)
                ->join('users', 'carts.user_id', '=', 'users.id')
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->get(['carts.sub_total', 'carts.quantity', 'products.image', 'products.name as productName', 'products.id as product_id', 'products.price', 'users.name', 'users.address', 'users.id as user_id', 'users.phonenumber', 'users.email']);
            $total = Cart::where('user_id', auth()->user()->id)->pluck('sub_total')->sum();
            // dd($user);
            if ($user->isNotEmpty()) {
                return view('pages.checkout', compact('user', 'total'));
            } else {
                return redirect('/')->withFailure(__('empty cart'));
            }

        } else {
            return redirect()->route('login')->withFailure(__('You must login to see this page'));
        }
   }




   public function showOrders(){

    if (Auth::id()) {
        $id =  auth()->user()->id;
        $orders = Order::all();

        return view('pages.orders',['orders'=>$orders]);
    }

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
        if (Auth::id()) {
            $user = Cart::where('user_id', auth()->user()->id)
                ->join('users', 'carts.user_id', '=', 'users.id')
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->get(['carts.sub_total', 'carts.quantity', 'products.image', 'products.name as productName', 'products.id as product_id', 'products.regular_price', 'users.name', 'users.address', 'users.id as user_id', 'users.phonenumber', 'users.email']);
            $total = Cart::where('user_id', auth()->user()->id)->pluck('sub_total')->sum();
            // dd($user[0]->user_id);


            $order = new Order();
            $order->user_id = $user[0]->user_id;
            $order->product_id = $user[0]->product_id;
            $order->product_quantity = $user[0]->quantity;
            $subtotal = Cart::where('user_id', auth()->user()->id)->pluck('sub_total')->sum();
            $order->order_total_price = $subtotal;
            $order->order_status = 0;
            $order->user_id = $user[0]->user_id;
            $order->save();

// dd($order);

            $cartItem = Cart::where('user_id', Auth::id())->get();
            Cart::destroy($cartItem);

            return redirect('/confirm');

        } else {
            return redirect()->route('login')->withFailure(__('You must login to see this page'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        if (Auth::id()) {
            $id =  auth()->user()->id;
            $orders = Order::where('user_id', $id)->get();
// dd($orders[0]);
            return view('pages.orders',['orders'=>$orders]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order = Order::find($order->id);
        $order->delete();
        return redirect()->back()->with('status', 'Order deleted successfully');
    }

    public function viewOrders()
    {

        $OrderJoin = Order::join('users', 'orders.user_id', '=', 'users.id')
           ->join('products', 'orders.product_id', '=', 'products.id')
           ->get(['orders.*',  'products.name as productName', 'products.id as product_id', 'products.regular_price', 'users.name as UserName', 'users.address',  'users.phonenumber', 'users.email']);
        //    dd($OrderJoin);

         return view('admin.view_all', compact('OrderJoin'));

    }

    public function cancel($id)
    {

        $order = Order::find($id);
        $order->order_status = 4;
        $order->save();
        return redirect()->back()->with('status', 'Order cancelled successfully');
    }
    public function process($id)
    {
        $order = Order::find($id);
        $order->order_status = 1;
        $order->save();
        return redirect()->back()->with('status', 'Order processed successfully');
    }
    public function delevered($id){
        $order = Order::find($id);
        $order->order_status = 3;
        $order->save();
        return redirect()->back()->with('status', 'Order delivered successfully');
    }
    public function shipped($id){
        $order = Order::find($id);
        $order->order_status = 2;
        $order->save();
        return redirect()->back()->with('status', 'Order shipped successfully');
    }
    public function pending($id){
        $order = Order::find($id);
        $order->order_status = 0;
        $order->save();
        return redirect()->back()->with('status', 'Order pending successfully');
    }






}
