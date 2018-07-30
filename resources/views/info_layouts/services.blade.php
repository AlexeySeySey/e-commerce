@extends('main_layouts.start')


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

    <div class="w3l_banner_nav_right">
        <!-- services -->
        <div class="services">
            <h3>{{ __('validation.sections.'.'Services') }}</h3>
            <div class="w3ls_service_grids">
                <div class="col-md-5 text-aqua text-left">
                    <h4>Cum soluta nobis est</h4>
                    <p>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis
                        voluptatibus maiores alias consequatur aut perferendis doloribus asperiores
                        repellat.</p>
                </div>
                <hr>
                <div class="col-md-7 w3ls_service_grid_right">
                    <table>
                        <tr>
                        <td>
                    <div class="col-md-4 w3ls_service_grid_right_1">
                        <img src="images/18.jpg" alt=" " class="img-responsive" />
                    </div>
                        </td>
                            <td>
                    <div class="col-md-4 w3ls_service_grid_right_1">
                        <img src="images/19.jpg" alt=" " class="img-responsive" />
                    </div>
                            </td>
                        </tr>
                    </table>
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <hr>
            <div class="w3ls_service_grids1">
                <table>
                    <tr>
                        <td>
                <div class="col-md-6 w3ls_service_grids1_left">
                    <img src="images/4.jpg" alt=" " class="img-responsive" />
                </div>
                        </td>
                        <td>
                <div class="col-md-6 w3ls_service_grids1_right">
                    <ul>
                        <li><i class="fa fa-long-arrow-right" aria-hidden="true"></i>et voluptates repudiandae sint et molestiae</li>
                        <li><i class="fa fa-long-arrow-right" aria-hidden="true"></i>rerum necessitatibus saepe eveniet ut</li>
                        <li><i class="fa fa-long-arrow-right" aria-hidden="true"></i>placeat facere possimus, omnis voluptas</li>
                    </ul>
                    <a href="{{ route('products') }}">{{ __('validation.other.'.'Shop Now') }}</a>
                </div>
                        </td>
                    </tr>
                </table>
                <div class="clearfix"> </div>
            </div>
        </div>
        <!-- //services -->
    </div>
    <div class="clearfix"></div>

    <div class="newsletter-top-serv-btm">
        <div class="container">
            <table>
                <tr>
                    <td>
            <div class="col-md-4 wthree_news_top_serv_btm_grid">
                <div class="wthree_news_top_serv_btm_grid_icon">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </div>
                <h3>Nam libero tempore</h3>
                <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus
                    saepe eveniet ut et voluptates repudiandae sint et.</p>
            </div>
                    </td>
                    <td>
            <div class="col-md-4 wthree_news_top_serv_btm_grid">
                <div class="wthree_news_top_serv_btm_grid_icon">
                    <i class="fa fa-bar-chart" aria-hidden="true"></i>
                </div>
                <h3>officiis debitis aut rerum</h3>
                <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus
                    saepe eveniet ut et voluptates repudiandae sint et.</p>
            </div>
                    </td>
                </tr>
            </table>
            <div class="clearfix"> </div>
        </div>
    </div>

@endsection