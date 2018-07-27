<div class="footer">
    <div class="container">
        <table>
            <tr>
                <td>
        <div class="col-md-3 w3_footer_grid" style="width: 300px !important;">
            <h3>{{ __('validation.sections.'.'information') }}</h3>
            <ul class="w3_footer_grid_list">
                <li><a href="{{ route('events') }}">{{ __('validation.sections.'.'Events') }}</a></li>
                <li><a href="{{ route('about') }}">{{ __('validation.sections.'.'About Us') }}</a></li>
                <li><a href="{{ route('products') }}">{{ __('validation.sections.'.'Best Deals') }}</a></li>
                <li><a href="{{ route('services') }}">{{ __('validation.sections.'.'Services') }}</a></li>
            </ul>
        </div>
                </td>
                <td>
        <div class="col-md-3 w3_footer_grid" style="width: 500px !important;">
            <h3 style="width: 200px !important;">{{ __('validation.sections.'.'policy info') }}</h3>
            <ul class="w3_footer_grid_list">
                <li><a href="{{ route('faqs') }}">FAQ</a></li>
                <li><a href="{{ route('privacy') }}">{{ __('validation.other.'.'privacy policy') }}</a></li>
            </ul>
        </div>
                </td>
        <div class="clearfix"> </div>
        <div class="agile_footer_grids">
            <div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">
                <div class="w3_footer_grid_bottom">
                    <h4>100% {{ __('validation.other.'.'secure payments') }}</h4>
                </div>
            </div>
            <div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">
                <div class="w3_footer_grid_bottom">
                    <h5>{{ __('validation.sections.'.'Contact Us') }}</h5>
                    <ul class="agileits_social_icons">
                        <li><a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="google"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="wthree_footer_copy">
        <p>© {{ ((\Carbon\Carbon::now())->year) }} {{ __('validation.sections.Grocery') }} {{ __('validation.sections.Store') }}. {{__('validation.other.All rights reserved') }}</p>
    </div>
</div>