@extends('layouts.master')
@section('content')
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">Shop</h1>
                        <ol class="breadcrumb">
                            <li><a href="/">Home</a></li>
                            <li class="active">{{ $categories->name }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="products section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    {{-- <div class="widget">
                        <h4 class="widget-title">Sort By</h4>
                        <form method="post" action="#">
                            <select class="form-control">
                                <option>Man</option>
                                <option>Women</option>
                                <option>Accessories</option>
                                <option>Shoes</option>
                            </select>
                        </form>
                    </div> --}}
                    <div class="widget product-category">
                        <h4 class="widget-title">Categories</h4>
                        @foreach ($category as $item)
                            <div class="panel-group commonAccordion" id="accordion" role="tablist"
                                aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a href='{{ route('category.show', $item->id) }}'>
                                                {{ $item->name }}
                                            </a>
                                        </h4>
                                    </div>

                                </div>


                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        @foreach ($data as $product)
                            <a href="{{ route('product.show', $product->id) }}">
                                <div class="col-md-3 col-sm-4">

                                    <div class="product-item">
                                        <div class="product-thumb">
                                            @if ($product->sale_price !== null)
                                                <span class="bage">Sale</span>
                                            @endif
                                            <img class="img-responsive" src="/public/Productimages/{{ $product->image }}"
                                                alt="product-img" />
                                            <div class="preview-meta">
                                                <ul>
                                                    {{-- <li>
                                                            <span  data-toggle="modal" data-target="#product-modal">
                                                                <i class="tf-ion-ios-search-strong"></i>
                                                            </span>
                                                        </li> --}}
                                                    {{-- <li>
                                                            <a href="#!" ><i class="tf-ion-ios-heart"></i></a>
                                                        </li> --}}
                                                    <li>


                                                        <form action="{{ route('cart.store') }}" method="post">
                                                            @csrf

                                                            <input type="hidden" name="id"
                                                                value="{{ $product->id }}" />
                                                            <input type="hidden" name="quantity" value="1" />
                                                            <input type="hidden" name="product_price"
                                                                value="{{ $product->product_price }}" />

                                                            <button type="submit"
                                                                style="width: 45px;height:45px;border:none">
                                                                <i class="tf-ion-android-cart"></i>
                                                            </button>
                                                        </form>



                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">

                                            <h4>{{ $product->name }}
                                            </h4>
                                            @if ($product->sale_price !== null)
                                                <p class="price" style="text-decoration: line-through">
                                                    {{ $product->regular_price }}JD</p>
                                                <p class="price" style="line-height:0px">{{ $product->sale_price }}JD</p>
                                            @else
                                                <p class="price">{{ $product->regular_price }}JD</p>
                                            @endif
                            </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        </div>







        <!-- Modal -->
        <div class="modal product-modal fade" id="product-modal">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tf-ion-close"></i>
            </button>
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <div class="modal-image">
                                    <img class="img-responsive" src="images/shop/products/modal-product.jpg"
                                        alt="product-img" />
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="product-short-details">
                                    <h2 class="product-title">GM Pendant, Basalt Grey</h2>
                                    <p class="product-price">$200</p>
                                    <p class="product-short-description">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem iusto
                                        nihil cum. Illo laborum numquam rem aut officia dicta cumque.
                                    </p>
                                    <a href="cart.html" class="btn btn-main">Add To Cart</a>
                                    <a href="product-single.html" class="btn btn-transparent">View Product
                                        Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal -->

        </div>
        </div>

        </div>
        </div>
    </section>
@endsection
