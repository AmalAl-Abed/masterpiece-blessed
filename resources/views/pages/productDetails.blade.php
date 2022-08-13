@extends('layouts.master')

@section('content')
    <section class="single-product">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
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
     @if(Session::has('message'))
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
                                        <img src='images/shop/single-products/product-1.jpg' alt=''
                                            data-zoom-image="images/shop/single-products/product-1.jpg" />
                                    </div>
                                    <div class='item'>
                                        <img src='images/shop/single-products/product-2.jpg' alt=''
                                            data-zoom-image="images/shop/single-products/product-2.jpg" />
                                    </div>

                                    <div class='item'>
                                        <img src='images/shop/single-products/product-3.jpg' alt=''
                                            data-zoom-image="images/shop/single-products/product-3.jpg" />
                                    </div>
                                    <div class='item'>
                                        <img src='images/shop/single-products/product-4.jpg' alt=''
                                            data-zoom-image="images/shop/single-products/product-4.jpg" />
                                    </div>
                                    <div class='item'>
                                        <img src='images/shop/single-products/product-5.jpg' alt=''
                                            data-zoom-image="images/shop/single-products/product-5.jpg" />
                                    </div>
                                    <div class='item'>
                                        <img src='images/shop/single-products/product-6.jpg' alt=''
                                            data-zoom-image="images/shop/single-products/product-6.jpg" />
                                    </div>

                                </div>

                                <!-- sag sol -->
                                <a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
                                    <i class="tf-ion-ios-arrow-left"></i>
                                </a>
                                <a class='right carousel-control' href='#carousel-custom' data-slide='next'>
                                    <i class="tf-ion-ios-arrow-right"></i>
                                </a>
                            </div>

                            <!-- thumb -->
                            <ol class='carousel-indicators mCustomScrollbar meartlab'>

                                <img src={{ $single->image }} alt='' height=500 />

                                <li data-target='#carousel-custom' data-slide-to='1'>
                                    <img src='images/shop/single-products/product-2.jpg' alt='' />
                                </li>
                                <li data-target='#carousel-custom' data-slide-to='2'>
                                    <img src='images/shop/single-products/product-3.jpg' alt='' />
                                </li>
                                <li data-target='#carousel-custom' data-slide-to='3'>
                                    <img src='images/shop/single-products/product-4.jpg' alt='' />
                                </li>
                                <li data-target='#carousel-custom' data-slide-to='4'>
                                    <img src='images/shop/single-products/product-5.jpg' alt='' />
                                </li>
                                <li data-target='#carousel-custom' data-slide-to='5'>
                                    <img src='images/shop/single-products/product-6.jpg' alt='' />
                                </li>
                                <li data-target='#carousel-custom' data-slide-to='6'>
                                    <img src='images/shop/single-products/product-7.jpg' alt='' />
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="single-product-details">
                        <h2>{{ $single->name }}</h2>
                        <p class="product-price">{{ $single->regular_price }}JD</p>

                        <p class="product-description mt-20">
                            {{ $single->short_description }}
                        </p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt, velit, sunt temporibus, nulla
                            accusamus similique sapiente tempora, at atque cumque assumenda minus asperiores est esse sequi
                            dolore magnam. Debitis, explicabo.</p>
                        <div class="color-swatches">
                            <span>color:</span>
                            <ul>
                                <li>
                                    <a href="#!" class="swatch-violet"></a>
                                </li>
                                <li>
                                    <a href="#!" class="swatch-black"></a>
                                </li>
                                <li>
                                    <a href="#!" class="swatch-cream"></a>
                                </li>
                            </ul>
                        </div>

                        <form action="{{ route('cart.store')}}" method="post">
                            @csrf
                        <div class="product-quantity">
                            <span>Quantity:</span>
                            <div class="product-quantity-slider">
                                <input id="product-quantity" type="number" value="" name="quantity">
                            </div>
                        </div>
                        <div class="product-category">
                            <span>category:</span>
                            <ul>
                                <li><a href="product-single.html">{{ $Productjoin[0]->categoryName }}</a></li>

                            </ul>
                        </div>




                            <input type="hidden" name="id" value="{{ $single->id }}"/>
                            <input type="hidden" name="product_price" value="{{$single->product_price }}"/>

                            <button type="submit" class="btn btn-main mt-20" >

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
                            <li class=""><a data-toggle="tab" href="#reviews" aria-expanded="false">Reviews
                                    (3)</a></li>
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
                                        @foreach($showComments as $comment)
                                        <li class="media">

                                            <a class="pull-left" href="#!">
                                                <img class="media-object comment-avatar" src="../images/blog/avater-1.jpg"
                                                    alt="" width="50" height="50" />
                                            </a>

                                            <div class="media-body">
                                                <div class="comment-info">
                                                    <h4 class="comment-author">
                                                        <a href="#!">{{$comment->name}}</a>

                                                    </h4>
                                                    <time datetime="2013-04-06T13:53">{{$comment->created_at}}</time>
                                                    <a class="comment-button" href="#!"><i
                                                            class="tf-ion-chatbubbles"></i>Reply</a>
                                                </div>

                                                <p>
                                                  {{$comment->comment}}
                                                </p>
                                            </div>

                                        </li>
                                        <!-- End Comment Item -->

                                      @endforeach



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

                                    <form action="{{ route('comments.store')}}" method="post">
                                        @csrf

                                    <input type="hidden" name="id" value="{{ $single->id }}"/>
                                    <textarea class="form-control" id="textAreaExample"  name="comment" rows="4" style="background: #fff;" placeholder="write your comment here"></textarea>

                                        <button class="active btn btn-main ms-20" style="margin-top:20px">Post your comment</button>
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
                        <div class="product-item">
                            <div class="product-thumb">
                                <span class="bage">Sale</span>
                                <img class="img-responsive" src="{{ $item->image }}" alt="product-img" />
                                <div class="preview-meta">
                                    <ul>
                                        <li>
                                            <span data-toggle="modal" data-target="#product-modal">
                                                <i class="tf-ion-ios-search"></i>
                                            </span>
                                        </li>
                                        <li>
                                            <a href="#"><i class="tf-ion-ios-heart"></i></a>
                                        </li>
                                        <li>
                                            <a href="#!"><i class="tf-ion-android-cart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4><a href="product-single.html">{{ $item->name }}</a></h4>
                                <p class="price">{{ $item->regular_price }}JD</p>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>



    <!-- Modal -->
    <div class="modal product-modal fade" id="product-modal">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="tf-ion-close"></i>
        </button>
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="modal-image">
                                <img class="img-responsive" src="images/shop/products/modal-product.jpg" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="product-short-details">
                                <h2 class="product-title">GM Pendant, Basalt Grey</h2>
                                <p class="product-price">$200</p>
                                <p class="product-short-description">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem iusto nihil cum. Illo
                                    laborum numquam rem aut officia dicta cumque.
                                </p>
                                <a href="#!" class="btn btn-main">Add To Cart</a>
                                <a href="#!" class="btn btn-transparent">View Product Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
