@extends('frontend.layout.master')
@section('body')
    <!-- .breadcumb-area start -->
    @include('frontend.component.breadcum', ['pageName' => 'Login'])
    <div class="account-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                    <div class="account-form form-style">
                        <form action="{{ route('register.customer') }}" method="post">
                            @csrf
                            <p>User Name *</p>
                            <input type="text" name="name" value="{{ old('name') }}">
                            @error('name')
                                <p style="color:red">{{ $message }}</p>
                            @enderror

                            <p>User Phone *</p>
                            <input type="text" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <p style="color:red">{{ $message }}</p>
                            @enderror

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
                            <p>Confirm Password *</p>
                            <input type="Password" name="password_confirmation">
                            <button type="submit">Register</button>
                        </form>
                        <div class="text-center">
                            <a href="{{ route('customer.login') }}">Or Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
