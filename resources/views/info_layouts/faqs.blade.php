@extends('main_layouts.start')


@section('banners')
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home"
                    aria-hidden="true"></i><a href="{{ route('start') }}">{{ __('validation.sections.'.'Home') }}</a><span>|</span></li>
            <li>FAQ</li>
        </ul>
    </div>
</div>
@parent
@endsection



@section('slider-brands')

<div class="w3l_banner_nav_right">
    <!-- faq -->
    <div class="faq">
        <h3>FAQ</h3>
        <table class="table">
            <tr>
                <td>
                    <h2><i class="fa fa-question"></i></h2>
                </td>
                <td>
                    <h2><i class="fa fa-check"></i></h2>
                </td>
            </tr>
            <!-- data -->
        </table>
    </div>
    <!-- //faq -->
</div>
<div class="clearfix"></div>
</div>

@endsection