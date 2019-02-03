@extends('main_layouts.start')



@section('banners')
    <div class="products-breadcrumb">
        <div class="container">
            <ul>
                <li><i class="fa fa-home" aria-hidden="true"></i><a
                            href="{{ route('start') }}">{{ __('validation.sections.'.'Home') }}</a><span>|</span></li>
                <li>@lang('validation.sections.Checkout')</li>
            </ul>
        </div>
    </div>
    @parent
@endsection

@section('top-brands')
@endsection

@section('slider-brands')
    <div class="w3l_banner_nav_right">
        <!-- about -->
        @if(count($goodsIn)>0)
        <div class="privacy about">
            <h3>@lang('validation.sections.Checkout')</h3>
            <div class="checkout-right">
                <h4>{{ __('validation.other.'.'Products count in your shopping cart') }}</h4>
                <table class="timetable_sub">
                    <thead>
                    <tr>
                        <th>{{ __('validation.other.'.'Product') }}</th>
                        <th>{{ __('validation.other.'.'Amount') }}</th>
                        <th>{{ __('validation.other.'.'Name') }}</th>
                        <th>{{ __('validation.other.'.'Price') }}</th>
                        <th>{{ __('validation.other.'.'Remove') }}</th>
                    </tr>
                    </thead>
                    <tbody>
@foreach($goodsIn as $good)
@if(count($good['good'])>0)
                     <tr class="rem1">
                        <td class="invert-image">
                            <a href="#">
                            <img src="{{ $good['good'][0]['image'] }}" alt=" " class="img-responsive">
                            </a>
                        </td>
                        <td class="invert">
                            <div class="quantity">
                                <div class="quantity-select">
                                    <div class="entry value"><span>{{ $good['good_count'] }}</span></div>
                                </div>
                            </div>
                        </td>
                        <td class="invert">{{ $good['good'][0]['name']  }}</td>

                        <td class="invert">${{ $good['good'][0]['price'] }}</td>
                        <td class="invert">
                            <div class="rem" onclick="dropFromCart({{ $good['good'][0]['id'] }}, {{ Auth::id() }}, {{ $good['good_count'] }})">
                                <div class="close1"></div>
                            </div>

                        </td>
                    </tr>
@endif
@endforeach
                    </tbody>
                </table>
            </div>
            <div class="checkout-left">
                <div class="col-md-4 checkout-left-basket">
                    <h4>{{ __('validation.other.'.'Continue to basket') }}</h4>
                    <ul>
                        @foreach($goodsIn as $good)
                        <li>{{ __('validation.other.'.'Product') }} "{{ $good['good'][0]['name'] }}" : <span>{{ $good['price'] }}</span></li>
                        @endforeach
                        <li>{{ __('validation.other.'.'Total') }} <i>:</i> <span><b>{{ $total }}$</b></span></li>
                    </ul>
                </div>
                <div class="col-md-8 address_form_agile">
                    <h4>{{ __('validation.other.'.'Add a new Details') }}</h4>
                    <form action="{{ route('payment') }}" method="post" class="creditly-card-form agileinfo_form" id="cartFormSend">
                        @csrf
                        <section class="creditly-wrapper wthree, w3_agileits_wrapper">
                            <div class="information-wrapper">
                                <div class="first-row form-group">
                                    <div class="controls">
                                        <label class="control-label">{{ __('validation.other.'.'Full name') }}: </label>
                                        <input class="billing-address-name form-control" type="text" name="name"
                                               placeholder="{{ __('validation.other.'.'Full name') }}" required>
                                    </div>
                                    <div class="w3_agileits_card_number_grids">
                                        <div class="w3_agileits_card_number_grid_left">
                                            <div class="controls">
                                                <label class="control-label">{{ __('validation.other.'.'Mobile number') }}
                                                    :</label>
                                                <input class="form-control" type="text"
                                                       placeholder="{{ __('validation.other.'.'Mobile number') }}" required>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="controls">
                                        <label class="control-label">{{ __('validation.other.'.'Locality') }}: </label>
                                        <input class="form-control" type="text"
                                               placeholder="{{ __('validation.other.'.'Locality') }}" required>
                                    </div>
                                    <div class="controls">
                                        <label class="control-label">{{ __('validation.other.'.'Address type') }}
                                            : </label>
                                        <select class="form-control option-w3ls" style="height:120% !important;">
                                            <option>{{ __('validation.other.'.'Office') }}</option>
                                            <option>{{ __('validation.other.'.'Home') }}</option>
                                            <option>{{ __('validation.other.'.'Commercial') }}</option>
                                        </select>
                                    </div>

                                    <div class="controls">
                                    <label class="control-label">@lang('validation.other.Address'):</label>
          <input class="form-control"
            type="text"
            name="address"
            placeholder="Beckerside Apt. 165"
            onchange="deliveryShow()"
            required>
          
                                    </div>
                                    <br>
                                    <div class="controls">
                                    <label class="control-label">@lang('validation.other.delivery'):</label>
          <input id="deliveryTimeInput"
            class="form-control"
            type="text"
            disabled
            onload="this.disabled=true">
          <br>
          
                                    </div>
<br>

                                </div>
                                <button class="btn btn-primary" type="submit">{{ __('validation.other.'.'Delivery to this Address') }}</button>
                            </div>
                        </section>
                        
<input type="hidden" name="goods" value="{{ (json_encode($goodsIn)) }}">

                    </form>
                    {{--
                        <div class="checkout-right-basket">
                        <a href="{{ route('payment') }}">{{ __('validation.other.'.'Make a Payment') }}</a>
                    </div>
                    --}}
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        @else
            <div class="alert alert-danger text-center">
                No products in cart...
            </div>
            @endif
    </div>
    <div class="clearfix"></div>
    </div>
@endsection

@section('content')
@endsection
