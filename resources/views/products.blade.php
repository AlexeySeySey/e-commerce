@extends('start')



@section('banners')
    <div class="products-breadcrumb">
        <div class="container">
            <ul>
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ route('start') }}">{{ __('validation.sections.'.'Home') }}</a><span>|</span></li>
                <li>{{ __('validation.sections.'.'Branded Foods') }}</li>
            </ul>
        </div>
    </div>
    @parent
@endsection



@section('slider-brands')
    <div class="w3l_banner_nav_right">
        <div class="w3l_banner_nav_right_banner3">
            <h3>{{ __('validation.sections.'.'Best Deals For New Products') }}<span class="blink_me"></span></h3>
        </div>
        @include('products_imports.top-products')
@endsection


