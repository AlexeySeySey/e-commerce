@extends('main_layouts.start')


@section('banners')
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home"
                    aria-hidden="true"></i><a href="{{ route('start') }}">{{ __('validation.sections.'.'Home') }}</a><span>|</span></li>
            <li>{{ __('validation.sections.'.'Contact Us') }}</li>
        </ul>
    </div>
</div>
@parent
@endsection



@section('slider-brands')
<div class="w3l_banner_nav_right">
    <div class="mail">
        <h3>{{ __('validation.sections.'.'Contact Us') }}</h3>
        <div class="agileinfo_mail_grids">
            <div>
                <table class="table">
                    <tr>
                        <td>@lang('validation.other.Address')</td>
                        <td>@lang('validation.other.Mail')</td>
                        <td>@lang('validation.other.Phone')</td>
                    </tr>
                    <tr>
                        <td>868 1st Avenue NYC.</td>
                        <td>info@example.com</td>
                        <td>(+123) 233 2362 826</td>
                    </tr>
                </table>
            </div>
            <hr>
            @guest
            <div class="alert alert-dark">
                <h1 class="text-white">@lang('validation.sections.Sign up') <b>/</b> @lang('validation.sections.Login')
                    <i class="fa fa-guest"></i></h1>
            </div>
            @else
            <div class="col-md-8 agileinfo_mail_grid_right">
                <form action="{{ URL::to('/sendMail') }}"
                    method="post">
                    @csrf
                    <div class="col-md-6 wthree_contact_left_grid">
                        <input type="text"
                            name="Subject"
                            placeholder="{{ __('validation.other.'.'Subject') }}*"
                            required>
                    </div>
                    <div class="clearfix"> </div>
                    <textarea name="Message"
                        required>{{ __('validation.other.Message') }}...</textarea>
                    <input type="hidden"
                        name="sender"
                        value="{{ Auth::id() }}">
                    <input type="submit"
                        value="{{ __('validation.other.'.'Submit') }}">
                    <input type="reset"
                        value="{{ __('validation.other.'.'Clear') }}">
                </form>
            </div>
            @endguest
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- //mail -->
</div>
<div class="clearfix"></div>
</div>
<!-- //banner -->

@endsection