<body>
<div class="agileits_header"style="max-height: 50px !important;">
    <div class="w3l_offers" id="headButton">
        <a href="{{ route('products') }}">{{ __('validation.sections.'.'Special offers') }}</a>
    </div>
    <div class="w3l_search">
        <form action="#" method="post">
            <input type="text" placeholder="{{ __('validation.sections.'.'Search').'...' }}">
            <input type="submit" value="">
        </form>
    </div>
    <div class="product_list_header" style="margin-left: 70px !important;">
        <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#cardModal">{{ __('validation.sections.'.'View Your Cart') }}</button>
        <div class="modal fade" id="cardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('validation.other.'.'Your Cart') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert-success" style="width:100px;">
                            {{ __('validation.other.'.'Empty') }}
                        </div>
                        <hr>
                       <button type="button" class="btn btn-info" data-dismiss="modal" style="margin-right:30px;">{{ __('validation.other.'.'Close') }}</button>
                    </div>
                    </div>
            </div>
        </div>

    </div>
    <div class="w3l_header_right">
        <ul>
            <li class="dropdown profile_details_drop">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
                <div class="mega-dropdown-menu">
                    <div class="w3ls_vegetables">
                        <ul class="dropdown-menu drp-mnu">
                            <li><a href="{{ route('login') }}">{{ __('validation.sections.'.'Login') }}</a></li>
                            <li><a href="{{ route('login') }}">{{ __('validation.sections.'.'Sign up') }}</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="w3l_header_right1">
        <h2  id="headButton"><a href="{{ route('mail') }}">{{ __('validation.sections.'.'Contact Us') }}</a></h2>
    </div>
    <div class="clearfix"> </div>
</div>
<!-- script-for sticky-nav -->
<script>
    $(document).ready(function() {
        var navoffeset=$(".agileits_header").offset().top;
        $(window).scroll(function(){
            var scrollpos=$(window).scrollTop();
            if(scrollpos >=navoffeset){
                $(".agileits_header").addClass("fixed");
            }else{
                $(".agileits_header").removeClass("fixed");
            }
        });

    });
</script>
<!-- //script-for sticky-nav -->
<br><br><br>
<div id="logoTest">
    <div class="container">
        <div class="w3ls_logo_products_left">
            <h1><a href="{{ route('start') }}"><span>{{ __('validation.sections.'.'Grocery') }}</span> {{ __('validation.sections.'.'Store') }}</a></h1>
        </div>


        <div class="w3ls_logo_products_left1">
            <ul class="special_items" id="specSections">
                <li style="opacity: 0 !important;"><a href="{{ route('events') }}">{{ __('validation.sections.'.'Events') }}</a><i>/</i></li>
                <li style="opacity: 0 !important;"><a href="{{ route('about') }}">{{ __('validation.sections.'.'About Us') }}</a><i>/</i></li>
                <li style="opacity: 0 !important;"><a href="{{ route('products') }}">{{ __('validation.sections.'.'Best Deals') }}</a><i>/</i></li>
                <li style="opacity: 0 !important;"><a href="{{ route('services') }}">{{ __('validation.sections.'.'Services') }}</a></li>
            </ul>
        </div>

        <div class="w3ls_logo_products_left1">
            <ul class="phone_email" id="specSectionsSec">
                <li><i class="fa fa-phone" aria-hidden="true"></i>(+0123) 234 567</li>
                <li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:store@grocery.com">store@grocery.com</a></li>
            </ul>
        </div>


        <div class="clearfix"></div>
    </div>
</div>