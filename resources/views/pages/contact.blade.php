@extends('layouts.master')

@section('content')
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">Contact Us</h1>
                        <ol class="breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li class="active">contact</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="page-wrapper">
        <div class="contact-section">
            <div class="container">
                <div class="row">

                    <!-- Contact Form -->
                    <div class="contact-form col-md-6 ">
                        @if(Session::has('message'))
                        <p class="alert  alert-light" style="background: #ffc0cb8f">{{ Session::get('message') }}</p>
                        @endif

                        <form id="contact-form" action="{{ route('message.store') }}" method="POST"
                            enctype="multipart/form-data" role="form">
                            @csrf
                            <div class="form-group">
                                <input type="text" placeholder="Your Name" class="form-control" name="name"
                                    id="name">
                            </div>

                            <div class="form-group">
                                <input type="email" placeholder="Your Email" class="form-control" name="email"
                                    id="email">
                            </div>

                            <div class="form-group">
                                <input type="text" placeholder="Subject" class="form-control" name="subject"
                                    id="subject">
                            </div>

                            <div class="form-group">
                                <textarea rows="6" placeholder="Message" class="form-control" name="message" id="message"></textarea>
                            </div>

                            <div id="mail-success" class="success">
                                Thank you. The Mailman is on His Way :)
                            </div>

                            <div id="mail-fail" class="error">
                                Sorry, don't know what happened. Try later :(
                            </div>

                            <div id="cf-submit">
                                <input type="submit" id="contact-submit" class="btn btn-transparent" value="Submit">
                            </div>

                        </form>
                    </div>
                    <!-- ./End Contact Form -->

                    <!-- Contact Details -->
                    <div class="contact-details col-md-6 ">
                        <div class="google-map">
                            <div id="map"></div>
                        </div>
                        <ul class="contact-short-info">
                            <li>
                                <i class="tf-ion-ios-home"></i>
                                <span>Khaja Road, Bayzid, Swiffyeh, Amman</span>
                            </li>
                            <li>
                                <i class="tf-ion-android-phone-portrait"></i>
                                <span>Phone: +880-31-000-000</span>
                            </li>

                            <li>
                                <i class="tf-ion-android-mail"></i>
                                <span>Email: BlseedBeauty@gmail.com</span>
                            </li>
                        </ul>
                        <!-- Footer Social Links -->
                        <div class="social-icon">
                            <ul>
                                <li><a class="fb-icon" href="https://www.facebook.com/amal.makeupresto"><i
                                            class="tf-ion-social-facebook"></i></a></li>
                                <li><a href="https://www.twitter.com/themefisher"><i class="fa-brands fa-tiktok"></i></a>
                                </li>
                                <li><a href="https://www.instagram.com/amal_makeupstore/?hl=en"><i class="tf-ion-social-instagram-outline"></i></a>
                                </li>
                            </ul>
                        </div>
                        <!--/. End Footer Social Links -->
                    </div>
                    <!-- / End Contact Details -->



                </div> <!-- end row -->
            </div> <!-- end container -->
        </div>
    </section>
@endsection
