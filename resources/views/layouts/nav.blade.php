<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>Blessed</title>

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Constra HTML Template v1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

    <!-- Themefisher Icon font -->
    <link rel="stylesheet" href={{ asset('plugins/themefisher-font/style.css') }}>
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href={{ asset('plugins/bootstrap/css/bootstrap.min.css') }}>

    <!-- Animate css -->
    <link rel="stylesheet" href={{ asset('plugins/animate/animate.css') }}>
    <!-- Slick Carousel -->
    <link rel="stylesheet" href={{ asset('plugins/slick/slick.css') }}>
    <link rel="stylesheet" href={{ asset('plugins/slick/slick-theme.css') }}>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/css/login.css')}}"> --}}

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href={{ asset('css/style.css') }}>
    <link rel="preconnect" href={{ asset('https://fonts.googleapis.com') }}>
    <link rel="preconnect" href={{ asset('https://fonts.googleapis.com') }}>
    <link rel="preconnect" href={{ asset('https://fonts.gstatic.com') }} crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Smooch+Sans:wght@200&family=Work+Sans:ital,wght@0,200;0,400;0,500;0,700;1,300&display=swap"
        rel="stylesheet">
    @livewireStyles

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    @livewireStyles
    {{-- <link rel="stylesheet" href="{{ asset('/css/app.css')}}"> --}}

    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body id="body">

    <!-- Start Top Header Bar -->
    <section class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-12 col-sm-4">
                    <div class="contact-number">
                        <i class="tf-ion-ios-telephone"></i>
                        <span>0129- 12323-123123</span>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 col-sm-4">
                    <!-- Site Logo -->
                    <div class="logo text-center">
                        <a href="index.html">
                            <!-- replace logo here -->
                            <svg width="135px" height="29px" viewBox="0 0 155 29" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"
                                    font-size="40" font-family="AustinBold, Austin" font-weight="bold">
                                    <g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
                                        <text id="AVIATO">
                                            <tspan x="108.94" y="325"
                                                style="font-size:48px;font-family: 'Smooch Sans', sans-serif;">Blessed
                                            </tspan>

                                        </text>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 col-sm-4">
                    <!-- Cart -->
                    <ul class="top-menu text-right list-inline">
                        <li class="dropdown cart-nav dropdown-slide">
                            <a href="{{ route('cart.index') }} "class="dropdown-toggle" data-toggle="dropdown"
                                data-hover="dropdown"><i class="tf-ion-android-cart"></i>Cart</a>
                            <div class="dropdown-menu cart-dropdown">
                                <!-- Cart Item -->

                                @php

                                    use App\Models\Cart;
                                    if (Auth::user() && Cart::where('user_id', Auth::user()->id)->count() > 0) {
                                        $cartItems = Cart::orderBy('carts.id', 'ASC')
                                            ->where('user_id', auth()->user()->id)
                                            ->join('users', 'carts.user_id', '=', 'users.id')
                                            ->join('products', 'carts.product_id', '=', 'products.id')
                                            ->get(['carts.id', 'carts.sub_total', 'carts.quantity', 'products.image', 'products.name', 'products.regular_price']);
                                            $total = Cart::where('user_id', auth()->user()->id)->pluck('sub_total')->sum();
                                    }
                                @endphp

                                @if (Auth::user() && Cart::where('user_id', Auth::user()->id)->count() > 0)
                                    <div class="media">


                                        <a class="pull-left" href="#!">
                                            <img class="media-object" src="{{ $cartItems[0]->image }}"
                                                alt="image" />
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="#!">{{ $cartItems[0]->name }}</a>
                                            </h4>
                                            <div class="cart-price">
                                                <span>{{ $cartItems[0]->quantity }} x</span>
                                                <span>{{ $cartItems[0]->regular_price }} </span>
                                            </div>
                                            <h5><strong> </strong></h5>
                                        </div>
                                        <a href="#!" class="remove"><i class="tf-ion-close"></i></a>

                                    </div>

                                @endif



                                <!-- / Cart Item -->


                                <div class="cart-summary">
                                    <span>Total</span>
                                    <span class="total-price">{{$total ?? 0}}.00JD</span>
                                </div>
                                <ul class="text-center cart-buttons">
                                    <li><a href="/cart" class="btn btn-small">View Cart</a></li>
                                    <li><a href="checkout.html" class="btn btn-small btn-solid-border">Checkout</a>
                                    </li>
                                </ul>
                            </div>

                        </li><!-- / Cart -->

                        <!-- Search -->
                        <li class="dropdown search dropdown-slide">
                            <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
                                    class="tf-ion-ios-search-strong"></i> Search</a>
                            <ul class="dropdown-menu search-dropdown">
                                <li>
                                    <form action="post"><input type="search" class="form-control"
                                            placeholder="Search..."></form>
                                </li>
                            </ul>
                        </li><!-- / Search -->

                        <!-- Languages -->
                        <li class="commonSelect">
                            <select class="form-control">
                                <option>EN</option>
                                <option>DE</option>
                                <option>FR</option>
                                <option>ES</option>
                            </select>
                        </li><!-- / Languages -->

                    </ul><!-- / .nav .navbar-nav .navbar-right -->
                </div>
            </div>
        </div>
    </section><!-- End Top Header Bar -->


    <!-- Main Menu Section -->
    <section class="menu">
        <nav class="navbar navigation">
            <div class="container">
                <div class="navbar-header">
                    <h2 class="menu-title">Main Menu</h2>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div><!-- / .navbar-header -->

                <!-- Navbar Links -->
                <div id="navbar" class="navbar-collapse collapse text-center">
                    <ul class="nav navbar-nav">

                        <!-- Home -->
                        <li class="dropdown ">
                            <a href="/">Home</a>
                        </li><!-- / Home -->


                        <!-- Elements -->


                        <li class="dropdown dropdown-slide">
                            <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                                data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">Shop
                                <span class="tf-ion-ios-arrow-down"></span></a>
                            <ul class="dropdown-menu">

                                @foreach ($data as $category)



                                <li><a href="{{ route('category.show', $category->id) }}" >{{$category->name}}</a></li>
                                @endforeach

                            </ul>
                        </li><!-- / Blog -->



                        <!-- Pages -->
                        <li class="dropdown full-width dropdown-slide">
                            <a href="/contact" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                                data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">Contact
                </a>
                          <!-- / .dropdown-menu -->
                        </li><!-- / Pages -->

                        <li class="dropdown full-width dropdown-slide">
                            <a href="/contact" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                                data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">About
                </a>
                          <!-- / .dropdown-menu -->
                        </li>






                        @if (Route::has('login'))
                            @auth

                                @if (Auth::user()->utype === 'ADM')


                                    <li class="dropdown dropdown-slide">
                                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown"
                                            data-hover="dropdown" data-delay="350" role="button" aria-haspopup="true"
                                            aria-expanded="false">{{ Auth::user()->name }}'s Profile <span
                                                class="tf-ion-ios-arrow-down"></span></a>

                                        <ul class="dropdown-menu">

                                            <li><a href="/admindash"> Admin Dashboard</a></li>


                                            <li><a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">logout</a>
                                            </li>


                                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                @csrf

                                            </form>

                                        </ul>
                                    </li>
                                @else
                                    <li class="dropdown dropdown-slide">
                                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown"
                                            data-hover="dropdown" data-delay="350" role="button" aria-haspopup="true"
                                            aria-expanded="false">
                                            {{ Auth::user()->name }}'s Profile <span
                                                class="tf-ion-ios-arrow-down"></span></a>
                                        <ul class="dropdown-menu">

                                            <li><a href="/user/profile">Account</a></li>

                                            <li><a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">logout</a>
                                            </li>


                                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                @csrf

                                            </form>

                                @endif
                            @else
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>



                            @endif
                            @endif
                        </ul>
                        </li><!-- / Blog -->

                        </ul><!-- / .nav .navbar-nav -->

                    </div>
                    <!--/.navbar-collapse -->
                </div><!-- / .container -->
            </nav>
        </section>
