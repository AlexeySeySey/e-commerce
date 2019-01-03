@extends('main_layouts.start')

@section('banners')
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home"
                    aria-hidden="true"></i><a href="{{ route('start') }}">{{ __('validation.sections.'.'Home') }}</a><span>|</span>
            </li>
            <li>{{ $name }}</li>
        </ul>
    </div>
</div>
@parent
@endsection



@section('slider-brands')
<div class="w3l_banner_nav_right">
    <h3>@lang('validation.sections.'.'Best Deals For New Products')<span class="blink_me"></span></h3>
    <div class='w3l_banner_nav_right_banner4' style="{{'background-image:'.url($image).';'}} background-repeat: no-repeat; background-size: auto;">
    <img src="{{$image}}" alt="loading" style="width:100%; height: 150% !important">
    </div>
    <div class="w3ls_w3l_banner_nav_right_grid">
        <h3>{{ $name }}</h3>
        <div class="w3ls_w3l_banner_nav_right_grid1">
            @include('products_imports.bestProductsImport')
            @if(count($goods)>0)
            <div class="container">
                {{ $goods->links() }}
            </div>
            @endif
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
</div>
@endsection