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

@section('slider-brands')
    <div class="w3l_banner_nav_right">
        <!-- about -->
        <div class="privacy about">
            <h3>@lang('validation.sections.Checkout')</h3>

            <div class="checkout-right">
                <h4>{{ __('validation.other.'.'Products count in your shopping cart') }}</h4>
                <table class="timetable_sub">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>{{ __('validation.other.'.'Product') }}</th>
                        <th>{{ __('validation.other.'.'Amount') }}</th>
                        <th>{{ __('validation.other.'.'Name') }}</th>
                        <th>{{ __('validation.other.'.'Price') }}</th>
                        <th>{{ __('validation.other.'.'Remove') }}</th>
                    </tr>
                    </thead>
                    <tbody>
 @foreach($goods as $good)
                    <tr class="rem1">
                        <td class="invert">{{ $loop->count }}</td>
                        <td class="invert-image"><a href="#"><img src="{{ $good['good']->image }}" alt=" " class="img-responsive"></a>
                        </td>
                        <td class="invert">
                            <div class="quantity">
                                <div class="quantity-select">
                                    <div class="entry value-minus">&nbsp;</div>
                                    <div class="entry value"><span>{{ $good['']-> }}</span></div>
                                    <div class="entry value-plus active">&nbsp;</div>
                                </div>
                            </div>
                        </td>
                        <td class="invert">{{ $good->name }}</td>

                        <td class="invert">${{ $good->price }}</td>
                        <td class="invert">
                            <div class="rem">
                                <div class="close1"></div>
                            </div>

                        </td>
                    </tr>
@endforeach
                    </tbody>
                </table>
            </div>
            <div class="checkout-left">
                <div class="col-md-4 checkout-left-basket">
                    <h4>{{ __('validation.other.'.'Continue to basket') }}</h4>
                    <ul>
                        <li>{{ __('validation.other.'.'Product') }}1 <i>-</i> <span>$15.00 </span></li>
                        <li>{{ __('validation.other.'.'Product') }}2 <i>-</i> <span>$25.00 </span></li>
                        <li>{{ __('validation.other.'.'Product') }}3 <i>-</i> <span>$29.00 </span></li>
                        <li>{{ __('validation.other.'.'Total Service Charges') }} <i>-</i> <span>$15.00</span></li>
                        <li>{{ __('validation.other.'.'Total') }} <i>-</i> <span>$84.00</span></li>
                    </ul>
                </div>
                <div class="col-md-8 address_form_agile">
                    <h4>{{ __('validation.other.'.'Add a new Details') }}</h4>
                    <form action="{{ URL::to('/payments') }}" method="post" class="creditly-card-form agileinfo_form">
                        @csrf
                        <section class="creditly-wrapper wthree, w3_agileits_wrapper">
                            <div class="information-wrapper">
                                <div class="first-row form-group">
                                    <div class="controls">
                                        <label class="control-label">{{ __('validation.other.'.'Full name') }}: </label>
                                        <input class="billing-address-name form-control" type="text" name="name"
                                               placeholder="{{ __('validation.other.'.'Full name') }}">
                                    </div>
                                    <div class="w3_agileits_card_number_grids">
                                        <div class="w3_agileits_card_number_grid_left">
                                            <div class="controls">
                                                <label class="control-label">{{ __('validation.other.'.'Mobile number') }}
                                                    :</label>
                                                <input class="form-control" type="text"
                                                       placeholder="{{ __('validation.other.'.'Mobile number') }}">
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="controls">
                                        <label class="control-label">{{ __('validation.other.'.'Locality') }}: </label>
                                        <input class="form-control" type="text"
                                               placeholder="{{ __('validation.other.'.'Locality') }}">
                                    </div>
                                    <div class="controls">
                                        <label class="control-label">{{ __('validation.other.'.'Address type') }}
                                            : </label>
                                        <select class="form-control option-w3ls">
                                            <option>{{ __('validation.other.'.'Office') }}</option>
                                            <option>{{ __('validation.other.'.'Home') }}</option>
                                            <option>{{ __('validation.other.'.'Commercial') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <button class="submit check_out">{{ __('validation.other.'.'Delivery to this Address') }}</button>
                            </div>
                        </section>
                    </form>
                    <div class="checkout-right-basket">
                        <a href="{{ route('payment') }}">{{ __('validation.other.'.'Make a Payment') }}</a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    </div>
@endsection

@section('content')
@endsection

