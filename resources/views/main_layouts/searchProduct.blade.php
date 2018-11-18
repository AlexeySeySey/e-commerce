@extends('main_layouts.start')

@section('banners')
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home"
                    aria-hidden="true"></i><a href="{{ route('start') }}">{{ __('validation.sections.'.'Home') }}</a><span>|</span>
            </li>
            <li>{{ str_replace('_',' ',(__("validation.sections.Search"))) }}</li>
        </ul>
    </div>
</div>
@parent
@endsection



@section('slider-brands')
<div class="w3l_banner_nav_right">
    <div class="w3ls_w3l_banner_nav_right_grid">
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