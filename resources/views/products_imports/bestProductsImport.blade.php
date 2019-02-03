@if(count($goods) == 0)
<div class="alert alert-info"
    role="alert">
    @lang("validation.other.No products available")!
    <hr>
    <div class="text-right">
        <button class="btn btn-primary"><a href="{{ route('start') }}"
                style="color: white;">Ok</a></button>
    </div>
</div>
@endif
@if(session('success'))
<div id="SeccuessMessage">
    <div class="alert alert-success">
        {{ __('validation.other.Product successfully added to your cart') }}
    </div>
</div>
@endif

<table>
    <tr>
        @foreach($goods as $key)
        <td style="padding: 50px !important; max-width:300px !important;">
        <div class="alert alert-danget">  
    </div>
            <div onmouseover="SaleText({{$key->id}})"
                onmouseout="HideSaleText({{$key->id}})">
                <div>
                  @if ($key->stock == 0)
                  <div class="alert alert-danger">
                  @lang("validation.other.No products available")
                  </div>
                  @else 
                  <div class="alert alert-success">
                     {{__('validation.other.Available').' '.$key->stock.'  '.__('validation.other.units') }}
                   </div>
                  @endif
                    <div class="alert-secondary">
                        <table>
                            <tr>
                                <td>
                                    @lang('validation.other.Rating'): <span id="{{'#ratingValue'.$key->id}}">{{
                                        $key->rating }}</span>
                                </td>
                                @if(count($key->like)==0)
                                <td>
                                    <button class="btn btn-primary"
                                        id="{{'#like'.$key->id}}"
                                        onclick="NewLike({{ $key->id }})"><i class="fa fa-thumbs-up"></i>
                                    </button>
                                </td>
                                @elseif(count($key->like)!=0)

                                @foreach($key->like as $k)
                                @if($id == $k->id)
                                @else
                                <td>
                                    <button class="btn btn-primary"
                                        id="{{'#like'.$key->id}}"
                                        onclick="NewLike({{ $key->id }})"><i class="fa fa-thumbs-up"></i></button>
                                </td>
                                @endif
                                @endforeach

                                @endif


                                <td>
                                    <div class="alert-seccess"
                                        id="{{'#likeResult'.$key->id}}"
                                        style="opacity: 0;"></div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div>
                    <img src="{{asset('images/offer.png')}}"
                        alt=" "
                        class="img-responsive" />
                </div>
                <div>
                    <figure>
                        <div class="snipcart-item block">
                            <div class="snipcart-thumb">
                                <a href="#"><img src="{{ URL::to('/').$key->image}}"
                                        alt="Loading..."
                                        class="img-responsive" /></a>
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
                                            <button class="btn btn-primary"
                                                data-toggle="modal"
                                                data-target="{{'#add'.$key->id}}">@lang('validation.other.Add to card')</button>
                                            <div class="modal fade"
                                                id="{{'add'.$key->id}}"
                                                tabindex="-1"
                                                role="dialog"
                                                aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="exampleModalLabel">{{ ucfirst($key->name) }}</h5>

                                                            <button style="padding-right: 200px !important;"
                                                                type="button"
                                                                class="close"
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
                                                                            <tr style="height: 100px;"></tr>
                                                                            <tr>
                                                                                <td>
                                                                                    @if($key->stock)
                                                                                    @if(($key->stock==0)||($key->stock==null))
                                                                                    <div class="alert alert-danger">
                                                                                        @lang('validation.other.No
                                                                                        products available')
                                                                                    </div>
                                                                                    @else
                                                                                    <div class="alert alert-success">
                                                                                        {{__('validation.other.Available').':
                                                                                        '.$key->stock.' '. __('validation.other.units') }}
                                                                                    </div>
                                                                                    @endif
                                                                                    @endif
                                                                                    <div class="alert alert-info">
                                                                                        @if($key->sale)
                                                                                        <span>{{
                                                                                            (($key->price)-((($key->price)/100)*(($key->sale)->percentages))).'$'}}
                                                                                            @else
                                                                                            <span>{{$key->price.'$'}}
                                                                                                @endif
                                                                                                <i class="fa fa-exchange"
                                                                                                    style="color:#4169E0"></i>
                                                                                                {{$key->weight}}@lang('validation.weight.'.$key->weight_type)</span>
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
                                                                                @if($key->stock)
                                                                                <input type="number"
                                                                                    name="goods_count"
                                                                                    min="1"
                                                                                    max="{{ $key->stock }}"
                                                                                    placeholder="0"
                                                                                    required
                                                                                    oninput="sumProducts(this,{{$key->price}},{{$key->id}},{{
                                                                                (($key->price)-((($key->price)/100)*(($key->sale)->percentages)))
                                                                                }})">
                                                                                @else
                                                                                <div class="alert alert-secondary">Empty
                                                                                    stock</div>
                                                                                @endif
                                                                                @if($key->stock)
                                                                                @if(($key->stock==0) || ($key->stock==null))
                                                                                @else
                                                                                <button type="reset"
                                                                                    class="btn btn-danger">
                                                                                    x
                                                                                </button>
                                                                                @endif
                                                                                @endif
                                                                                <br>
                                                                                <table>
                                                                                    <tr>

                                                                                        <td>
                                                                                            @if(($key->stock==0)||($key->stock==null))
                                                                                            @else
                                                                                            <input type="submit"
                                                                                                class="btn btn-primary"
                                                                                                value="{{__('validation.other.Add to card')}}">
                                                                                            @endif
                                                                                        </td>

                                                                                        <td>
                                                                                            <span id="{{'#'.'good-count'.$key->id}}"
                                                                                                class="alert alert-success"></span>
                                                                                            <input type="hidden"
                                                                                                name="good_id"
                                                                                                value="{{$key->id}}">
                                                                                            <input type="hidden"
                                                                                                id="{{'#getPrice'.$key->id}}"
                                                                                                name="price">
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
                                            <input type="hidden"
                                                value="{{$key->id}}"
                                                id="code">
                                            <button type="button"
                                                class="btn btn-primary"
                                                data-toggle="modal"
                                                data-target="{{'.bd-example-modal-lg'.$key->id}}">
                                                <b>?</b>
                                            </button>
                                            @include('products_imports.goods_characteristics')
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </figure>
                </div>
            </div>
        </td>
        @if($loop->iteration%4==0)
    </tr>
    <tr>
        @endif
        @endforeach
    </tr>
</table>