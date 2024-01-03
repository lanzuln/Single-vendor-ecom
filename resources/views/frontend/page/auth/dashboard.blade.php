@extends('frontend.layout.master')
@section('body')
    <!-- .breadcumb-area start -->
    @include('frontend.component.breadcum', ['pageName' => 'Login'])
<h2>Welcome {{}}</h2>
@endsection
