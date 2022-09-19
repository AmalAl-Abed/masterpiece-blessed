@extends('layouts.master')
@section('content')
    <div class="hero-slider">
        <div class="slider-item th-fullpage hero-area" style="background-image: url(images/banner/banner8.png);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 text-center">
                        <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">PRODUCTS</p>
                        <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">Choose the perfect shade
                            <br>and coverage for you.
                        </h1>
                        <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn"
                            href="/category/1">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-item th-fullpage hero-area" style="background-image: url(images/banner/banner9.png);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 text-center">
                        <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1" style="color: aliceblue">
                            PRODUCTS</p>
                        <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5" style="color: aliceblue">
                            Be The Influence
                            <br> In Your Look.
                        </h1>
                        <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn"
                            style="color: aliceblue; border-color:aliceblue;" href="shop.html">Shop Now </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-item th-fullpage hero-area" style="background-image: url(images/banner/banner4.png);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 text-left">
                        <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">PRODUCTS</p>
                        <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">A FULL FACE OF BLESSED
                            <br>
                        </h1>
                        <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn"
                            href="shop.html">Shop Now</a>
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
                        <h2>FOR AN IRRESISTIBLE HEAD-TO-TOE GLOW</h2>
                    </div>
                </div>
                @foreach ($data as $category)
                    <div class='col-md-6'>
                        <div class='category-box'>
                            <a href='{{ route('category.show', $category->id) }}'>
                                <img src="public/image/{{ $category->image }}" alt='' width="200px"
                                    height="300px" />
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

    <div class="row">
        <div class="col-xs-6" style="padding: 0px !important">
            <div class="img">
                <img src="../images/grid.png" width="100%">
            </div>
        </div>
        <div class="col-xs-6">

            <div class="vc_column-inner" style="background-image:url('images/b1.jpg')">


                <div class="mkdf-eh-item-inner">
                    <div class="mkdf-eh-item-content mkdf-eh-custom-3083" style="padding: 85px 34% 0px 117px;">
                        <div class="mkdf-section-title-holder  mkdf-st-top-tagline-position mkdf-st-left-position mkdf-st-bottom-image-position "
                            style="text-align: left">
                            <div class="mkdf-st-inner">
                                <span class="mkdf-st-tagline" style="margin-bottom: 8px">
                                    LEAD </span>
                                <h2 class="mkdf-st-title">
                                    What It Takes to Lead </h2>
                                <h5 class="mkdf-st-subtitle" style="margin-top: 6px">
                                    after years of experimenting with the best-of-the-best in beauty—and still seeing a void
                                    in the industry for products that performed across all skin types and tones </h5>
                                <p class="mkdf-st-text" style="margin-top: 19px">
                                    At vero eos et accusamus et iusto odi odgnissimos ducimus qui
                                    blanditiis praesentium volup tatum deleniti atque corrupti quos
                                    dolores et quas </p>
                            </div>
                        </div>
                        <div class="vc_empty_space" style="height: 34px"><span class="vc_empty_space_inner"></span>
                        </div><a itemprop="url" href="category/3" target="_self"
                            class="mkdf-btn mkdf-btn-medium mkdf-btn-outline">

                            <span class="mkdf-btn-text"
                                style="border: solid 1px gray;
                            padding: 10px;">Find
                                beauty</span>
                        </a>
                    </div>
                </div>

                <div class="mkdf-eh-item   mkdf-horizontal-alignment-center  " data-item-class="mkdf-eh-custom-3310"
                    data-681-768="35% 0 35% 0" data-680="65% 0 70% 0">
                    <div class="mkdf-eh-background-holder"
                        style="background-image: url(https://biagiotti.qodeinteractive.com/wp-content/uploads/2019/08/m-h-single-img-4.jpg)">
                    </div>
                    <div class="mkdf-eh-item-inner">
                        <div class="mkdf-eh-item-content mkdf-eh-custom-3310" style="padding: 0 0 0 0">
                            <div class="mkdf-video-button-holder  ">
                                <a class="mkdf-video-button-play"
                                    href="https://vimeo.com/142239321?_ga=2.103285320.932864496.1663413681-815126731.1662976016"
                                    data-rel="prettyPhoto[video_button_pretty_photo_276]">
                                    <span class="mkdf-video-button-play-inner">
                                        <span class="mkdf-vb-icon ion-ios-play"></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-xs-6" style="padding: 0px !important">

            <div class="vc_column-inner">


                <div class="mkdf-eh-item" data-item-class="mkdf-eh-custom-3083" data-1400-1600="120px 22% 120px 80px"
                    data-1025-1399="120px 22% 120px 80px" data-769-1024="100px 16% 100px 40px"
                    data-681-768="140px 20% 140px 117px" data-680="100px 7% 100px 35px">

                    <div class="mkdf-eh-item-inner">
                        <div class="mkdf-eh-item-content mkdf-eh-custom-3083" style="padding: 85px 34% 0px 117px">
                            <div class="mkdf-section-title-holder  mkdf-st-top-tagline-position mkdf-st-left-position mkdf-st-bottom-image-position "
                                style="text-align: left">
                                <div class="mkdf-st-inner">
                                    <span class="mkdf-st-tagline" style="margin-bottom: 8px">
                                        RARE <h2 class="mkdf-st-title">
                                            What makes us Rare </h2>
                                        <h5 class="mkdf-st-subtitle" style="margin-top: 6px">
                                            Together we’re building a safe, welcoming space in beauty and beyond. This is
                                            makeup
                                            made to feel good in, without hiding what makes you unique. And it’s all vegan
                                            and
                                            cruelty free. </h5>
                                        <p class="mkdf-st-text" style="margin-top: 19px">
                                            At vero eos et accusamus et iusto odi odgnissimos ducimus qui
                                            blanditiis praesentium volup tatum deleniti atque corrupti quos
                                            dolores et quas molestias </p>
                                </div>
                            </div>
                            <div class="vc_empty_space" style="height: 34px"><span class="vc_empty_space_inner"></span>
                            </div><a itemprop="url" href="category/4" target="_self"
                                class="mkdf-btn mkdf-btn-medium mkdf-btn-outline">
                                <span class="mkdf-btn-text"
                                    style="border: solid 1px gray;
                            padding: 10px;">Find
                                    beauty</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="mkdf-eh-item   mkdf-horizontal-alignment-center  " data-item-class="mkdf-eh-custom-3310"
                    data-681-768="35% 0 35% 0" data-680="65% 0 70% 0">
                    <div class="mkdf-eh-background-holder"
                        style="background-image: url(https://biagiotti.qodeinteractive.com/wp-content/uploads/2019/08/m-h-single-img-4.jpg)">
                    </div>
                    <div class="mkdf-eh-item-inner">
                        <div class="mkdf-eh-item-content mkdf-eh-custom-3310" style="padding: 0 0 0 0">
                            <div class="mkdf-video-button-holder  ">
                                <a class="mkdf-video-button-play"
                                    href="https://vimeo.com/142239321?_ga=2.103285320.932864496.1663413681-815126731.1662976016"
                                    data-rel="prettyPhoto[video_button_pretty_photo_276]">
                                    <span class="mkdf-video-button-play-inner">
                                        <span class="mkdf-vb-icon ion-ios-play"></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
        <div class="col-xs-6" style="padding: 0px !important">
            <div class="img">
                <img src="../images/grid22.png" width="100%"height="500px">
            </div>
        </div>
    </div>
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
                                <img class="img-responsive" src="public/Productimages/{{ $item->image }}"
                                    alt="product-img" />
                                <div class="preview-meta">
                                    <ul>
                                        {{-- <li>
                                            <span data-toggle="modal" data-target="#product-modal">
                                                <i class="tf-ion-ios-search-strong"></i>
                                            </span>
                                        </li>
                                        <li>
                                            <a href="#!"><i class="tf-ion-ios-heart"></i></a>
                                        </li> --}}

                                        <form action="{{ route('cart.store') }}" method="post">
                                            @csrf

                                            <input type="hidden" name="id" value="{{ $item->id }}" />
                                            <input type="hidden" name="quantity" value="1" />
                                            <input type="hidden" name="product_price"
                                                value="{{ $item->product_price }}" />

                                            <button type="submit" style="width: 45px;height:45px;border:none">
                                                <i class="tf-ion-android-cart"></i>
                                            </button>
                                        </form>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4><a href=""></a>{{ $item->name }}</h4>
                                <p class="price">{{ $item->regular_price }}</p>
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
    <section class="call-to-action bg-gray section" style="background-image: url(images/land-background-5-2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="title">
                        <h2>SUBSCRIBE TO NEWSLETTER</h2>
                        <p>By entering your email address and clicking "Subscribe Now" you agree to receive
                             <br>marketing email messages from Blessed at the email address provided.</p>
                    </div>
                    <div class="col-lg-6 col-md-offset-3">
                        <div class="input-group subscription-form">
                            <input type="text" class="form-control" placeholder="Enter Your Email Address">
                            <span class="input-group-btn">
                                <button class="btn btn-main" style="background-color: #d3a6a1;color:black"
                                    type="button">Subscribe Now!</button>
                            </span>
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->

                </div>
            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- End section -->





    <div class="services pd">
        <div class="container">
            <div class="row">
                <div class="title">
                    <h2>What We Offer</h2>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-3">
                    <div class="square"><i class="fa-solid fa-medal"></i></div>
                    <div class="serv">
                        <h4>QUALITY</h4>
                        <p>Prime quality beauty products! Only the best for all our customers.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="serv">
                        <div class="square"><i class="fa-solid fa-feather"></i></div>
                        <h4>NATURAL</h4>
                        <p>We love Beauty that look Natural, we try to show this through work.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="square"><i class="fa-solid fa-gift"></i></div>
                    <div class="serv">
                        <h4>LATEST</h4>
                        <p>Benefit from the latest techniques and products from Beauty World.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="square"><i class="fa-regular fa-heart"></i></div>
                    <div class="serv">
                        <h4>LOVE</h4>
                        <p>All our customers are the best, this is why we treat them with care.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
