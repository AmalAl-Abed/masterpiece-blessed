@extends('layouts.master')

@section('content')
    <section class="single-product">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ol class="breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li><a href="shop.html">Shop</a></li>
                        <li class="active">Single Product</li>
                    </ol>
                </div>

                <div class="col-md-6">
                    <ol class="product-pagination text-right">
                        <li><a href="blog-left-sidebar.html"><i class="tf-ion-ios-arrow-left"></i> Next </a></li>
                        <li><a href="blog-left-sidebar.html">Preview <i class="tf-ion-ios-arrow-right"></i></a></li>
                    </ol>
                </div>

            </div>
            <div>
                @if (Session::has('message'))
                    <p class="alert  alert-light" style="background: #ffc0cb8f">{{ Session::get('message') }}</p>
                @endif
            </div>

            <div class="row mt-20">
                <div class="col-md-5">
                    <div class="single-product-slider">
                        <div id='carousel-custom' class='carousel slide' data-ride='carousel'>
                            <div class='carousel-outer'>
                                <!-- me art lab slider -->
                                <div class='carousel-inner '>
                                    <div class='item active'>
                                        @if ($single->sale_price !== null)
                                            <span class="bage"
                                                style="position: absolute;
                                        top: 12px;
                                        right: 12px;
                                        background: #000;
                                        color: #fff;
                                        font-size: 18px;
                                        padding: 4px 12px;
                                        font-weight: 300;
                                        display: inline-blo">Sale</span>
                                        @endif
                                        <img src='/public/Productimages/{{ $single->image }}' alt=''
                                            data-zoom-image="images/shop/single-products/product-1.jpg" />

                                    </div>
                                </div>


                            </div>



                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="single-product-details">
                        <h2>{{ $single->name }}</h2>
                        @if ($single->sale_price !== null)
                            <p class="product-price">Previous price: <span
                                    style="text-decoration: line-through">{{ $single->regular_price }}JD</span></p>
                            <h4 class="product-price">Sale price: <span>{{ $single->sale_price }}JD</span></h4>
                        @else
                            <h4 class="product-price"><span>{{ $single->regular_price }}JD</span></h4>
                        @endif



                        <p class="product-description mt-20">
                            {{ $single->short_description }}
                        </p>
                        <p>Conceal, contour, and set with next-level precision:

                            Use damp for buildable coverage or dry for full coverage.
                            .</p>
                        <div class="color-swatches">
                            <span>shades:</span>
                            <ul>

                                <li>
                                    <a href="#!" class="swatch-black"></a>
                                </li>
                                <li>
                                    <a href="#!" class="swatch-cream"></a>
                                </li>
                            </ul>
                        </div>

                        <form action="{{ route('cart.store') }}" method="post">
                            @csrf
                            <div class="product-quantity">
                                <span>Quantity:</span>
                                <div class="product-quantity-slider">
                                    <input id="product-quantity" type="number" value="" name="quantity" requiredcar
                                        placeholder="1">
                                </div>
                            </div>
                            <div class="product-category">
                                <span>category:</span>
                                <ul>
                                    <li><a href="product-single.html">{{ $Productjoin[0]->categoryName }}</a></li>

                                </ul>
                            </div>




                            <input type="hidden" name="id" value="{{ $single->id }}" />

                            @if ($single->sale_price !== null)
                                <input type="hidden" name="product_price" value="{{ $single->sale_price }}" />
                            @else
                                <input type="hidden" name="product_price" value="{{ $single->product_price }}" />
                            @endif

                            <input type="hidden" name="product_price" value="{{ $single->product_price }}" />

                            <button type="submit" class="btn btn-main mt-20">

                                Add To Cart
                            </button>
                        </form>


                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="tabCommon mt-20">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#details" aria-expanded="true">Details</a>
                            </li>
                            @php $count = 0; @endphp
                            <li class=""><a data-toggle="tab" href="#reviews" aria-expanded="false">Reviews

                                </a></li>
                        </ul>



                        <div class="tab-content patternbg">
                            <div id="details" class="tab-pane fade active in">
                                <h4>Product Description</h4>
                                <p>{{ $single->description }},</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis delectus quidem
                                    repudiandae veniam distinctio repellendus magni pariatur molestiae asperiores animi, eos
                                    quod iusto hic doloremque iste a, nisi iure at unde molestias enim fugit, nulla
                                    voluptatibus. Deserunt voluptate tempora aut illum harum, deleniti laborum animi neque,
                                    praesentium explicabo, debitis ipsa?</p>
                            </div>
                            <div id="reviews" class="tab-pane fade">
                                <div class="post-comments">
                                    <ul class="media-list comments-list m-bot-50 clearlist">
                                        <!-- Comment Item start-->

                                        @foreach ($showComments as $comment)
                                            @php $count++ @endphp

                                            <li class="media">

                                                <a class="pull-left" href="#!">
                                                    <img class="media-object comment-avatar"
                                                        src="../images/blog/avater-1.jpg" alt="" width="50"
                                                        height="50" />
                                                </a>

                                                <div class="media-body">
                                                    <div class="comment-info">
                                                        <h4 class="comment-author">
                                                            <a href="#!">{{ $comment->name }}</a>

                                                        </h4>
                                                        <time datetime="2013-04-06T13:53">{{ $comment->created_at }}</time>

                                                    </div>

                                                    <p>
                                                        {{ $comment->comment }}
                                                    </p>
                                                </div>

                                            </li>
                                            <!-- End Comment Item -->
                                        @endforeach

                                        <div id="count" style="display: none">{{ $count }}</div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container my-5 py-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12 col-lg-10 col-xl-8">
                    <div class="card">

                        <div class="card-footer py-3 border-0">
                            <div class="d-flex flex-start w-100">

                                <div class="form-outline w-100">
                                    <h4 for="textAreaExample">Tell Us What you Think About This Product:</h4>

                                    <form action="{{ route('comments.store') }}" method="post">
                                        @csrf

                                        <input type="hidden" name="id" value="{{ $single->id }}" />
                                        <textarea class="form-control" id="textAreaExample" name="comment" rows="4" style="background: #fff;"
                                            placeholder="write your comment here"></textarea>

                                        <button class="active btn btn-main ms-20" style="margin-top:20px">Post your
                                            comment</button>
                                    </form>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="products related-products section">
        <div class="container">
            <div class="row">
                <div class="title text-center">
                    <h2>Related Products</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($related_products as $item)
                    <div class="col-md-3">
                        <a href="{{route('product.show', $item->id)}}">
                        <div class="product-item">
                            <div class="product-thumb">
                                <span class="bage">Sale</span>
                                <img class="img-responsive" src="/public/Productimages/{{ $item->image }}"
                                    alt="product-img" />
                                <div class="preview-meta">
                                    <ul>
                                        {{-- <li>
                                            <span data-toggle="modal" data-target="#product-modal">
                                                <i class="tf-ion-ios-search"></i>
                                            </span>
                                        </li>
                                        <li>
                                            <a href="#"><i class="tf-ion-ios-heart"></i></a>
                                        </li> --}}
                                        <form action="{{ route('cart.store') }}" method="post">
                                            <input type="hidden" name="id" value="{{ $item->id }}" />
                                            <input type="hidden" name="quantity" value="1" />
                                            <input type="hidden" name="product_price"
                                                value="{{ $item->product_price }}" />
                                            @csrf

                                            <button type="submit" style="width: 45px;height:45px;border:none">
                                                <i class="tf-ion-android-cart"></i>
                                            </button>
                                        </form>



                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4>{{ $item->name }}</h4>
                                <p class="price">{{ $item->regular_price }}JD</p>
                            </div>
                        </a>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>



    <!-- Modal -->
@endsection
