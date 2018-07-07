@extends('start')


@section('banners')
    <div class="products-breadcrumb">
        <div class="container">
            <ul>
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ route('start') }}">{{ __('validation.sections.'.'Home') }}</a><span>|</span></li>
                <li>{{ __('validation.sections.'.'Services') }}</li>
            </ul>
        </div>
    </div>
    @parent
@endsection



@section('slider-brands')

    @include('services_imports.services')
    @include('services_imports.statistics')
    @include('services_imports.info')

@endsection