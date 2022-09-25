<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $Productjoin = DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->select('products.*', 'categories.name as category_name')
        ->get();
        // dd($Productjoin);
        return view('admin.productView', compact('Productjoin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')->get();
        return view('admin.product_Create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->short_description	 = $request->short_description;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('public/Productimages');
            $image->move($destinationPath, $name);
            $product->image = $name;
            $product->regular_price = $request->price;
            $product->sale_price = $request->sale_price;
            $product->category_id = $request->category_id;
            $product->save();
            return redirect('/product')->with('success', 'Product has been added');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $single = Product::find($id);
        $related_products = Product::where('category_id', $single->category_id)->inRandomOrder()->Limit(4)->get();



        $Productjoin = DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->select('categories.name as categoryName')
        ->where('products.id', $id)->get();

        $showComments= Comment::orderBy('comments.id', 'ASC')
        ->join('users', 'comments.user_id', '=', 'users.id')
        ->where('comments.product_id',$id)
        ->get(['comments.*','users.name']);




        return view('pages.productDetails', compact("single", "Productjoin","related_products","showComments"));
    }






    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Productjoin = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.id')
        ->select('products.*', 'categories.name as category_name')
        ->where('products.id', $id)->get();
        $categories = DB::table('categories')->get();

        return view('admin.product_Edit', compact('Productjoin', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->short_description	 = $request->short_description;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('public/Productimages');
            $image->move($destinationPath, $name);
            $product->image = $name;
        }
        $product->regular_price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->category_id = $request->category_id;
        $product->save();
        return redirect('/product')->with('success', 'Product has been added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/product')->with('success', 'Product has been deleted Successfully');
    }
}
