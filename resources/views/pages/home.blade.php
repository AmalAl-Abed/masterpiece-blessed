@extends('layouts.master')
@section('content')
    <div class="hero-slider">
        <div class="slider-item th-fullpage hero-area" style="background-image: url(images/banner/banner4.png);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 text-left">
                        <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">PRODUCTS</p>
                        <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">The beauty of nature
                            <br> is hidden in details.
                        </h1>
                        <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn"
                            href="shop.html">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-item th-fullpage hero-area" style="background-image: url(images/banner/banner5.png);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 text-center">
                        <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">PRODUCTS</p>
                        <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">The beauty of nature
                            <br> is hidden in details.
                        </h1>
                        <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn"
                            href="shop.html">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-item th-fullpage hero-area" style="background-image: url(images/banner/banner1.png);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 text-center">
                        <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1" style="color: aliceblue">
                            PRODUCTS</p>
                        <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5" style="color: aliceblue">
                            The beauty of nature
                            <br> is hidden in details.
                        </h1>
                        <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn"
                            style="color: aliceblue; border-color:aliceblue;" href="shop.html">Shop Now </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class='product-category section'>
        <div class='container'>
            <div class='row'>
                <div class="col-md-12">
                    <div class='title text-center'>
                        <h2>HAVE A LOOK AT OUR PRODUCTS</h2>
                    </div>
                </div>
                @foreach ($data as $category)
                    <div class='col-md-6'>
                        <div class='category-box'>
                            <a href='{{ route('category.show', $category->id) }}'>
                                <img src='https://i.ytimg.com/vi/TNHXfys3Dak/maxresdefault.jpg' alt='' />
                                <div class='content' style='background-color: #ffffffdb;'>
                                    <h3>{{ $category->name }}</h3>
                                    <p>{{ $category->description }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <section class="products section bg-gray">
        <div class="container">
            <div class="row">
                <div class="title text-center">
                    <h2>Trendy Products</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($popular_products as $item)
                    <div class="col-md-4">
                        <div class="product-item">
                            <div class="product-thumb">
                                <span class="bage">Sale</span>
                                <img class="img-responsive" src="images/shop/products/product-1.jpg" alt="product-img" />
                                <div class="preview-meta">
                                    <ul>
                                        <li>
                                            <span data-toggle="modal" data-target="#product-modal">
                                                <i class="tf-ion-ios-search-strong"></i>
                                            </span>
                                        </li>
                                        <li>
                                            <a href="#!"><i class="tf-ion-ios-heart"></i></a>
                                        </li>
                                        <li>
                                            <a href="#!"><i class="tf-ion-android-cart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4><a href=""></a>{{$item->name}}</h4>
                                <p class="price">{{$item->regular_price}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!--
    Start Call To Action
    ==================================== -->
    <section class="call-to-action bg-gray section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="title">
                        <h2>SUBSCRIBE TO NEWSLETTER</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, <br> facilis numquam
                            impedit ut sequi. Minus facilis vitae excepturi sit laboriosam.</p>
                    </div>
                    <div class="col-lg-6 col-md-offset-3">
                        <div class="input-group subscription-form">
                            <input type="text" class="form-control" placeholder="Enter Your Email Address">
                            <span class="input-group-btn">
                                <button class="btn btn-main" type="button">Subscribe Now!</button>
                            </span>
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->

                </div>
            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- End section -->

    <section class="section instagram-feed">
        <div class="container">
            <div class="row">
                <div class="title">
                    <h2>View us on instagram</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="instagram-slider" id="instafeed"
                        data-accessToken="IGQVJYeUk4YWNIY1h4OWZANeS1wRHZARdjJ5QmdueXN2RFR6NF9iYUtfcGp1NmpxZA3RTbnU1MXpDNVBHTzZAMOFlxcGlkVHBKdjhqSnUybERhNWdQSE5hVmtXT013MEhOQVJJRGJBRURn">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
