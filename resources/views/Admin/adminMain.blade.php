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

<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0"
     style="background-color: black !important; height: 72px !important;">
    <table>
        <tr>
            <td>
                <span style="color: grey; text-shadow: #00c0ef 20px 20px 20px">{{ ucwords($locale) }}</span>
            </td>
            <td>
                <p class="navbar-brand col-sm-3 col-md-2 mr-0">
                    @lang('validation.sections.Grocery') @lang('validation.sections.Store') | @lang('validation.positions.Admin')
                </p>
            </td>
        </tr>
    </table>
    <div>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger">
            @lang('validation.other.Exit')
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</nav>


<br><br><br>

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
                <span class="sidebar-text-category">@lang('validation.sections.Home')</span></a>
        </li>
        @include('Admin.adminImports.Sections')
    </ul>
</div>
<div style="margin-left:200px !important" id="main-content-admin-first">
    <div class="container-fluid">
        <div class="row">
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">@lang('validation.other.Welcome')!</h1>
                    <table>
                        <tr>
                            <td>
                                <span class="foo blue"></span><span> @lang('validation.other.Online')</span>
                            </td>
                            <td>
                                <span class="foo red"></span><span> @lang('validation.other.Offline')</span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="container-fluid">
                    <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
                </div>
            </main>
        </div>
    </div>


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
<script src="{{ asset('js/chart.js') }}"></script>
<script>
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                data: [0, {{$onlie_count}}, {{$onlie_count*3}}, {{$onlie_count*4}}, {{$onlie_count*5}}],
                lineTension: 0,
                backgroundColor: 'transparent',
                borderColor: '#007bff',
                borderWidth: 4,
                pointBackgroundColor: '#007bff'
            }, {
                data: [0, {{$offline_count}}, {{$offline_count*3}}, {{$offline_count*4}}, {{$offline_count*5}}],
                lineTension: 0,
                backgroundColor: 'transparent',
                borderColor: 'red',
                borderWidth: 4,
                pointBackgroundColor: 'red'
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: false
                    }
                }]
            },
            legend: {
                display: false,
            }
        }
    });
</script>

</body>
</html>