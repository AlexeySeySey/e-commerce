@section('head')
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('validation.sections.'.'Grocery') }}  {{ __('validation.sections.'.'Store') }}</title>

    {{-- to avoid problems --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet" type="text/css" media="all"/>
    {{-- to avoid problems --}}

    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{asset('css/admin.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <link rel="icon" href="{{ asset('images/main_icon.png') }}">
    <link rel="stylesheet" href="{{asset('css/top_scroll.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin_styles.css')}}">
</head>
@show

@section('top-nav')
<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow"
     style="background-color: black !important; height: 72px !important;">
    <p class="navbar-brand col-sm-3 col-md-2 mr-0">
        @lang('validation.sections.Grocery') @lang('validation.sections.Store') | @lang('validation.positions.Admin')
    </p>
    <a class="btn btn-danger" href="{{ route('logout') }}" style="margin-right:80px !important;">
        <i class="fa fa-sign-out"></i><b><i>@lang('validation.other.Exit')</i></b>
    </a>
</nav>

<br><br><br>
@show

@section('sections')
<div class="admin-sidebar bg-secondary" id="navbar-admin" style="position:fixed !important;">
    <button class="btn btn-secondary" style="width:50px;" onclick="rightNavBarAdmin()" id="navbar-category-admin"><i
                class="fa fa-window-minimize" id="navbar-category-admin-icon"></i></button>
    <ul class="nav flex-column" style="padding-bottom: 100px !important; position: static !important;">
        <li id="right-first-elem-admin">
            <a href="{{ route('start') }}" target="_blank" id="admin-category-icon-link"><span id="admin-category-icon"><i
                            class="fa fa-tachometer" id="admin-category-icon-sub"></i></span>
                <span id="sidebar-text-category-first">@lang('validation.sections.Website')</span></a>
        </li>
        <br>
        <li id="right-first-elem-admin">
            <a href="{{ route('admin') }}" id="admin-category-icon-link"><span id="admin-category-icon"><i
                            class="fa fa-home" id="admin-category-icon-sub"></i></span>
                <span id="sidebar-text-category-first"  class="sidebar-text-category">@lang('validation.sections.Home')</span></a>
        </li>
        @foreach($admin_categoires as $key)
            <li id="{{'#categ-admin-elem'.$key->id}}" class="admin-panel-categires-list-all"
                onmouseover="adminIconCat({{ $key->id }})" onmouseout="adminIconCatOut({{ $key->id }})">
                <a class="admin-panel-categires-list" href="{{ route('adminChild',[$key->id]) }}">
                    <table>
                        <tr id="{{'#sidecat'.$key->id}}">
                            <td>
                                <span id="{{'#admin-category-icon'.$key->id}}"
                                      class="admin-cat-icon-nav">{!! $key->icon !!}</span>
                            </td>
                            <td class="sidebar-text-category">
                                <span>{{ __('validation.admin-categies.'.$key->name) }}</span>
                            </td>
                        </tr>
                    </table>
                </a>
            </li>
        @endforeach
    </ul>
</div>

<br><br>
    <div style="margin-left:200px !important;">
@show


@section('content')
    <div class="container-fluid">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
@show

@section('footer')
    </div>

<div id="footer">
    <footer class="main-footer-admin">
        <span class="main-footer-admin-in">© {{ Carbon\Carbon::now()->year }} {{ __('validation.sections.'.'Grocery') }}  {{ __('validation.sections.'.'Store') }}</span>
    </footer>
</div>


<script src="{{ asset('js/jquery331.js') }}" defer></script>
<script type="text/javascript" src="{{asset('js/move-top.js')}}"></script>
<script type="text/javascript" src="{{asset('js/easing.js')}}"></script>
<script src="{{asset('js/minicart.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/Custom/admin.js')}}" defer></script>
<script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>

</body>
</html>
@show