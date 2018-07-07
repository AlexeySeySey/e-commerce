<div class="w3ls_w3l_banner_nav_right_grid">
    <h3>{{ __('validation.sections.'.'Popular Brands') }}</h3>
    <div class="w3ls_w3l_banner_nav_right_grid1">
        <table>
            <tr>
                @foreach($goods as $key)
                    <td style="padding: 50px !important;">
                        <div onmouseover="SaleText({{$key->id}})" onmouseout="HideSaleText({{$key->id}})">
                            <div>
                                <img src="{{asset('images/offer.png')}}" alt=" "
                                     class="img-responsive"/>
                            </div>
                            <div>
                                <figure>
                                    <div class="snipcart-item block">
                                        <div class="snipcart-thumb">
                                            <a href="#"><img
                                                        src="{{asset('images/'.$key->image)}}"
                                                        alt="Loading..."
                                                        class="img-responsive"/></a>
                                            <p>{{$key->name}} {{($key->weight)}}</p>
                                            <br>
                                            <h5>{{$key->price}}$</h5>
                                            @if($key->sale)
                                                <span id="{{'#precName'.$key->id}}"
                                                      style="opacity: 0;"><b>@lang('validation.other.Sale')</b>: {{ ($key->sale)->name }}</span>
                                                <span id="{{'#prec'.$key->id}}"
                                                      style="opacity: 0;"><b>({{ ($key->sale)->percentages }}%)</b></span>
                                            @endif


                                        </div>
                                        <div class="snipcart-details">
                                            <table style="padding:0px !important">
                                                <tr style="padding:0px !important">
                                                    <td style="padding-right:5px !important; padding-top:0px !important; padding-bottom: 0px !important; padding-left: 0px !important;">
                                                        <button class="btn btn-primary" data-toggle="modal"
                                                                data-target="{{'#add'.$key->id}}">{{__('validation.other.Add to card')}}</button>
                                                        <div class="modal fade" id="{{'add'.$key->id}}"
                                                             tabindex="-1" role="dialog"
                                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLabel">{{ ucfirst($key->name) }}</h5>
                                                                        <button style="padding-right: 200px !important;"
                                                                                type="button" class="close"
                                                                                data-dismiss="modal"
                                                                                aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <table>
                                                                            <tr>
                                                                                <td>
                                                                                    <table>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <h5>@lang('validation.other.Name')
                                                                                                    : </h5>
                                                                                            </td>
                                                                                            <td>
                                                                                                <span>{{$key->name}}</span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr style="height: 100px;"></tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                @if((($key->characteristic)->stock==0)||(($key->characteristic)->stock==null))
                                                                                                    <div class="alert alert-danger">
                                                                                                        @lang('validation.other.No products available')
                                                                                                    </div>
                                                                                                @else
                                                                                                    <div class="alert alert-success">
                                                                                                        {{__('validation.other.Available').': '.($key->characteristic)->stock}}
                                                                                                    </div>
                                                                                                @endif
                                                                                                <div class="alert alert-info">
                                                                                                    @if($key->sale)
                                                                                                        <span>{{ (($key->price)-((($key->price)/100)*(($key->sale)->percentages))).'$'}}
                                                                                                            @else
                                                                                                                <span>{{$key->price.'$'}}
                                                                                                                    @endif
                                                                                                                    <i class="fa fa-exchange"
                                                                                                                       style="color:#4169E0"></i> {{$key->weight}}@lang('validation.weight.'.$key->weight_type)</span>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                                <td>
                                                                                    <div style="margin-left: 500px;">
                                                                                        <form method="POST"
                                                                                              action="{{URL::to('/addToCart')}}">
                                                                                            @csrf
                                                                                            <input type="number"
                                                                                                   name="good_count"
                                                                                                   min="1"
                                                                                                   max="{{ ($key->characteristic)->stock }}"
                                                                                                   placeholder="0"
                                                                                                   required
                                                                                                   id="good-count"
                                                                                                   oninput="sumProducts(this,{{$key->price}},{{$key->id}})">
                                                                                            <button type="reset"
                                                                                                    class="btn btn-danger">
                                                                                                x
                                                                                            </button>
                                                                                            <br>
                                                                                            <table>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <input type="submit"
                                                                                                               class="btn btn-primary"
                                                                                                               value="{{__('validation.other.Add to card')}}">
                                                                                                    </td>
                                                                                                    <td>
                                                                                                            <span id="{{'#goodCount'.$key->id}}"
                                                                                                                  class="alert alert-success"></span>
                                                                                                        <input type="hidden"
                                                                                                               name="good_id"
                                                                                                               value="{{$key->id}}">
                                                                                                        <input type="hidden"
                                                                                                               name="good_count"
                                                                                                               id="gcount"
                                                                                                               value="">
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </form>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                    <div class="modal-footer"
                                                                         style="padding-right: 200px !important;">
                                                                        <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-dismiss="modal">@lang('validation.other.Close')</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td style="padding:0px !important">
                                                        <input type="hidden" value="{{$key->id}}" id="code">
                                                        <button type="button" class="btn btn-primary"
                                                                data-toggle="modal"
                                                                data-target="{{'.bd-example-modal-lg'.$key->id}}">
                                                            <b>?</b>
                                                        </button>
                                                        <div class="{{'modal fade bd-example-modal-lg'.$key->id}}"
                                                             tabindex="-1" role="dialog"
                                                             aria-labelledby="myLargeModalLabel"
                                                             aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <table class="table table-hover"
                                                                           style="max-width: 200px;">
                                                                        <tr>
                                                                            <td>
                                                                                №
                                                                                {{ ($key->characteristic)->id }}
                                                                            </td>
                                                                            <td>
                                                                                {{__('validation.other.'.'Stock')}}
                                                                                {{ ($key->characteristic)->stock }}
                                                                            </td>
                                                                            <td>
                                                                                {{__('validation.other.'.'Producer')}}
                                                                                {{ ($key->characteristic)->producer }}
                                                                            </td>
                                                                            <td>
                                                                                {{__('validation.other.'.'Address')}}
                                                                                {{ ($key->characteristic)->address }}
                                                                            </td>
                                                                            <td>
                                                                                {{__('validation.other.'.'Produced')}}
                                                                                {{ ($key->characteristic)->produced }}
                                                                            </td>
                                                                            <td>
                                                                                {{__('validation.other.'.'Expiration')}}
                                                                                {{ ($key->characteristic)->expiration }}
                                                                            </td>
                                                                            <td>
                                                                                {{__('validation.other.'.'Phone')}}
                                                                                {{ ($key->characteristic)->phone }}
                                                                            </td>
                                                                            <td>
                                                                                {{__('validation.other.'.'Mail')}}
                                                                                {{ ($key->characteristic)->mail }}
                                                                            </td>
                                                                            <td>
                                                                                {{__('validation.other.'.'Arrival')}}
                                                                                {{ ($key->characteristic)->arrival }}
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </td>
                    @if($loop->iteration%3==0)
            </tr>
            <tr>
                @endif
                @endforeach
            </tr>
        </table>
        <div class="clearfix"> </div>
    </div>

</div>
</div>
<div class="clearfix"></div>
</div>