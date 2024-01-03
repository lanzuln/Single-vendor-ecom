@extends('frontend.layout.master')
@section('body')
    <!-- .breadcumb-area start -->
    @include('frontend.component.breadcum', ['pageName' => 'Login'])
    <div class="account-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                    <div class="account-form form-style">
                        <form action="{{route('login.customer')}}" method="post">
                            @csrf
                            <p>Email Address *</p>
                            <input type="email" name="email" value="{{ old('email') }}">
                            @error('email')
                                <p style="color:red">{{ $message }}</p>
                            @enderror

                            <p>Password *</p>
                            <input type="Password" name="password">
                            @error('password')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                            <div class="row">
                                <div class="col-lg-6">
                                    <input id="password" type="checkbox">
                                    <label for="password">Save Password</label>
                                </div>
                                <div class="col-lg-6 text-right">
                                    <a href="#">Forget Your Password?</a>
                                </div>
                            </div>
                            <button type="submit">SIGN IN</button>
                        </form>
                        <div class="text-center">
                            <a href="{{ route('customer.register') }}">Or Creat an Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
