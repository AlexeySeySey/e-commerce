@extends('start')


@section('banners')
    <div class="products-breadcrumb">
        <div class="container">
            <ul>
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ route('start') }}">{{ __('validation.sections.'.'Home') }}</a><span>|</span></li>
                <li>{{ __('validation.sections.'.'About Us') }}</li>
            </ul>
        </div>
    </div>
    @parent
@endsection



@section('slider-brands')

@include('about_imports.about')
@include('about_imports.team')
@include('about_imports.reviews')

@endsection
