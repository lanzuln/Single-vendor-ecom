@extends('frontend.layout.master')
@section('body')
    <!-- .breadcumb-area start -->
    @include('frontend.component.breadcum', ['pageName'=>'shop'])
    <!-- .breadcumb-area end -->
    <!-- product-area start -->
    <div class="product-area pt-100">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="product-menu">
                        <ul class="nav justify-content-center">
                            <li>
                                <a class="active" data-toggle="tab" href="#all">All product</a>
                            </li>
                            @foreach ($category as $item)
                                <li>
                                    <a data-toggle="tab" href="#{{ $item->slug}}">{{ $item->title }}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="all">
                    <ul class="row">
                        @foreach ($product as $item)
                            <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                <div class="product-wrap">
                                    <div class="product-img">
                                        <span>Sale</span>
                                        <img src="{{ asset($item->product_image ?? 'avator.png') }}" alt="">
                                        <div class="product-icon flex-style">
                                            <ul>
                                                <li><a data-toggle="modal" data-target="#exampleModalCenter"
                                                        href="{{route('single.product',$item->slug)}}"><i class="fa fa-eye"></i></a></li>
                                                <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="{{route('single.product',$item->slug)}}"><i class="fa fa-shopping-bag"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="{{route('single.product',$item->slug)}}">{{ $item->name }}</a></h3>
                                        <p class="pull-left">${{ $item->product_price }}

                                        </p>
                                        <ul class="pull-right d-flex">
                                            @for ($i = 0; $i < $item->rating; $i++)
                                                <li><i class="fa fa-star"></i></li>
                                            @endfor
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                    <div class="col-12 text-center d-flex justify-content-center">
                        <div class="py-3 text-center">
                            {{ $product->links() }}
                        </div>
                    </div>
                </div>

                @foreach ($category as $item)
                <div class="tab-pane" id="{{$item->slug}}">
                    <ul class="row">

                              @foreach ($item->products as $c_item)
                            <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                <div class="product-wrap">
                                    <div class="product-img">
                                        <span>Sale</span>
                                        <img src="{{ asset($c_item->product_image ?? 'avator.png') }}" alt="">
                                        <div class="product-icon flex-style">
                                            <ul>
                                                <li><a data-toggle="modal" data-target="#exampleModalCenter"
                                                        href="{{route('single.product',$c_item->slug)}}"><i class="fa fa-eye"></i></a></li>
                                                <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="{{route('single.product',$c_item->slug)}}"><i class="fa fa-shopping-bag"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="{{route('single.product',$c_item->slug)}}">{{ $c_item->name }}</a></h3>
                                        <p class="pull-left">${{ $c_item->product_price }}

                                        </p>
                                        <ul class="pull-right d-flex">
                                            @for ($i = 0; $i < $c_item->rating; $i++)
                                                <li><i class="fa fa-star"></i></li>
                                            @endfor
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                    </ul>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- product-area end -->
    <!-- start social-newsletter-section -->
    <section class="social-newsletter-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="newsletter text-center">
                        <h3>Subscribe Newsletter</h3>
                        <div class="newsletter-form">
                            <form>
                                <input type="text" class="form-control" placeholder="Enter Your Email Address...">
                                <button type="submit"><i class="fa fa-send"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- end social-newsletter-section -->
@endsection
