<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tohoney - Home Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('frontend/assets/images/favicon.png') }}">
    <!-- Place favicon.ico in the root directory -->
    <!-- all css here -->
    <!-- bootstrap v4.0.0-beta.2 css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}">
    <!-- font-awesome v4.6.3 css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.min.css') }}">
    <!-- flaticon.css')}} -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/flaticon.css') }}">
    <!-- jquery-ui.css')}} -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/jquery-ui.css') }}">
    <!-- metisMenu.min.css')}} -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/metisMenu.min.css') }}">
    <!-- swiper.min.css')}} -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/swiper.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/styles.css') }}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">
    <!-- modernizr css -->
    <script src="{{ asset('frontend/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    @stack('style')
</head>

<body>
    <!--Start Preloader-->
    <div class="preloader-wrap">
        <div class="spinner"></div>
    </div>
    <!-- search-form here -->
    @include('frontend.component.search')
    <!-- search-form here -->
    <!-- header-area start -->
    @include('frontend.body.header')
    <!-- header-area end -->
@yield('body')
    <!-- .footer-area start -->
    @include('frontend.body.footer')
    <!-- .footer-area end -->
    <!-- Modal area start -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body d-flex">
                    <div class="product-single-img w-50">
                        <img src="{{ asset('frontend/assets/images/product/product-details.jpg') }}" alt="">
                    </div>
                    <div class="product-single-content w-50">
                        <h3>Pure Nature Hohey</h3>
                        <div class="rating-wrap fix">
                            <span class="pull-left">$219.56</span>
                            <ul class="rating pull-right">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li>(05 Customar Review)</li>
                            </ul>
                        </div>
                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled
                            and demoralized by the charms of pleasure of the moment, so blinded by desire denounce with
                            righteous indignation</p>
                        <ul class="input-style">
                            <li class="quantity cart-plus-minus">
                                <input type="text" value="1" />
                            </li>
                            <li><a href="cart.html">Add to Cart</a></li>
                        </ul>
                        <ul class="cetagory">
                            <li>Categories:</li>
                            <li><a href="#">Honey,</a></li>
                            <li><a href="#">Olive Oil</a></li>
                        </ul>
                        <ul class="socil-icon">
                            <li>Share :</li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal area start -->
    <!-- jquery latest version -->
    <script src="{{ asset('frontend/assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <!-- scrollup.js')}} -->
    <script src="{{ asset('frontend/assets/js/scrollup.js') }}"></script>
    <!-- isotope.pkgd.min.js')}} -->
    <script src="{{ asset('frontend/assets/js/isotope.pkgd.min.js') }}"></script>
    <!-- imagesloaded.pkgd.min.js')}} -->
    <script src="{{ asset('frontend/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- jquery.zoom.min.js')}} -->
    <script src="{{ asset('frontend/assets/js/jquery.zoom.min.js') }}"></script>
    <!-- countdown.js')}} -->
    <script src="{{ asset('frontend/assets/js/countdown.js') }}"></script>
    <!-- swiper.min.js')}} -->
    <script src="{{ asset('frontend/assets/js/swiper.min.js') }}"></script>
    <!-- metisMenu.min.js')}} -->
    <script src="{{ asset('frontend/assets/js/metisMenu.min.js') }}"></script>
    <!-- mailchimp.js')}} -->
    <script src="{{ asset('frontend/assets/js/mailchimp.js') }}"></script>
    <!-- jquery-ui.min.js')}} -->
    <script src="{{ asset('frontend/assets/js/jquery-ui.min.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>
    @stack('script')
</body>




</html>
