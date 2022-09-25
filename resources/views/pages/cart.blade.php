@extends('layouts.master')

@section('content')
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-md-offset-1">
                    <div class="block">
                        <div class="product-list">
                            <div class="col-md-12">
                                <div class="content">
                                    <h1 class="page-name">Cart</h1>
                                    <ol class="breadcrumb">
                                        <li><a href="index.php">Home</a></li>
                                        <li class="active">cart</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
    </section>




    <div class="page-wrapper">
        <div class="cart shopping">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block">
                            <div class="product-list">



                                <table class="table">

                                    <thead>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total price</th>
                                        <th class="text-center">Action</th>
                                    </thead>



                                    <tbody>

                                        @foreach ($cartItems as $item)
                                            <tr>
                                                <td>
                                                    <img src='/public/Productimages/{{ $item->image }}'height="100"
                                                        alt="">
                                                </td>
                                                <td>{{ $item->name }}</td>
                                                @if ($item->sale_price !== null)
                                                    <td>{{ $item->sale_price }}JD</td>
                                                @else
                                                    <td>{{ $item->regular_price }}JD</td>
                                                @endif


                                                <td>
                                                    <form action="{{ route('cart.update', $item->id) }}" method="POST"
                                                        enctype="multipart/form-data">

                                                        @method('PUT')
                                                        @csrf
                                                        <input type="number" name="quantity" min="1"
                                                            value={{ $item->quantity }}>
                                                        <input type="submit" class='btn btn-main btn-small btn-round'
                                                            value="CONFIRM" style="background-color:black;"
                                                            name="update_update_btn">


                                                    </form>
                                                    <?php

                                                    ?>
                                                </td>


                                                <td>{{ $item->sub_total }}.00JD /-</td>

                                                <form action="{{ route('cart.destroy', $item->id) }}" method="POST"
                                                    class="d-inline">
                                                    @method('DELETE')
                                                    @csrf
                                                    <td><button style="border:none; background:#fff"><i
                                                                class="fa-solid fa-trash-can"
                                                                style="margin-left:40px"></i></a></button></td>
                                                </form>
                                        @endforeach







                                        </tr>



                                        <tr class="table-bottom">
                                            <td><a href='/category/1' class="btn btn-main "
                                                    style="margin-top:0;">Continue shopping</a></td>
                                            <td colspan="3" style="font-size:20px"><b>Grand Total<b></td>
                                            <td style="font-size:20px"><b>{{ $total }}JD /-<b></td>


                                            {{-- <form action="{{ route('cart.destroy' , $item->id)}}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                             <td><button class="delete-btn"> Delete all </a></button>
                        </form> --}}





                                        </tr>

                                    </tbody>



                                </table>



                                <a href="{{ route('checkout') }}" class="btn btn-main pull-right">Checkout</a>







                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
