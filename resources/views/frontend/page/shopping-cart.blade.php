@extends('frontend.layout.master')
@section('body')
    <!-- .breadcumb-area start -->
    @include('frontend.component.breadcum', ['pageName' => 'Shoping cart'])
    <div class="cart-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table-responsive cart-wrap">
                        <thead>
                            <tr>
                                <th class="images">Image</th>
                                <th class="product">Product</th>
                                <th class="ptice">Price</th>
                                <th class="quantity">Quantity</th>
                                <th class="total">Total</th>
                                <th class="remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $item)
                                <tr>
                                    <td class="images"><img src="{{ asset($item->options->product_image ?? 'avator.png') }}"
                                            alt="" width="70"></td>
                                    <td class="product"><a href="single-product.html">{{ $item->name }}</a></td>
                                    <td class="ptice">${{ $item->price }}</td>
                                    <td class="quantity cart-plus-minus">
                                        <input type="text" value="{{ $item->qty }}">
                                        <div class="dec qtybutton">-</div>
                                        <div class="inc qtybutton">+</div>
                                    </td>
                                    <td class="total">${{ $item->price * $item->qty }}</td>
                                    <td class="remove"><a href="{{ route('shopping.cart.remove', $item->rowId) }}"><i
                                                class="fa fa-times"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row mt-60">
                        <div class="col-xl-4 col-lg-5 col-md-6 ">
                            <div class="cartcupon-wrap">
                                <ul class="d-flex">
                                    <li><a href="{{ route('shop.page') }}">Continue Shopping</a></li>
                                </ul>
                                <h3>Cupon</h3>
                                <p>Enter Your Cupon Code if You Have One</p>
                                <div class="cupon-wrap">
                                    <form action="{{ route('apply.cupon') }}" method="post">
                                        @csrf
                                        <input type="text" placeholder="Cupon Code" name="coupne_name">
                                        @error('coupne_name')
                                            <p style="color:red">{{ $message }}</p>
                                        @enderror

                                        <button type="submit">Apply Cupon</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-3 offset-xl-5 col-lg-4 offset-lg-3 col-md-6">
                            <div class="cart-total text-right">
                                <h3>Cart Totals</h3>

                                <p>
                                    @if (Session::has('coupne'))
                                        <a class="p-1" href="{{ route('remove.cupon', 'coupon_name') }}"> <i
                                                class="fa fa-times">
                                            </i></a>

                                        <b> {{ Session::get('coupne')['name'] }} </b> is Applied
                                    @endif
                                </p>
                                <ul>
                                    @if (Session::has('coupne'))
                                        <li><span class="pull-left">Discount Amount:
                                            </span>৳{{ Session::get('coupne')['discount'] }}</li>
                                        <li><span class="pull-left"> Total: </span>${{ Session::get('coupne')['balance'] }}
                                            <del class="text-danger">৳ {{ Session::get('coupne')['cart_total'] }}</del>
                                        </li>
                                    @else
                                        <li><span class="pull-left">Subtotal: </span>${{ $total }}</li>
                                        <li><span class="pull-left"> Total: </span>${{ $total }}</li>
                                    @endif
                                </ul>
                                <a href="{{ route('customer.checkoutpage') }}">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
