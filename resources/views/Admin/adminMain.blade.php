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

<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow"
     style="background-color: black !important; height: 72px !important;">
    <p class="navbar-brand col-sm-3 col-md-2 mr-0">
        Grocery Store | Admin
    </p>
    <a class="btn btn-danger" href="{{ route('logout') }}" style="margin-right:80px !important;">
        <i class="fa fa-sign-out" style="font-size: 15px;"></i><b><i>Exit</i></b>
    </a>
</nav>


<br><br><br>

<div class="admin-sidebar bg-secondary" id="navbar-admin">
    <button class="btn btn-secondary" style="width:50px;" onclick="rightNavBarAdmin()" id="navbar-category-admin"><i class="fa fa-window-minimize" id="navbar-category-admin-icon"></i></button>
    <ul class="nav flex-column" style="padding-bottom: 100px !important;">
        <li id="right-first-elem-admin">
            <a href="#" target="_blank" id="admin-category-icon-link"><span id="admin-category-icon"><i class="fa fa-tachometer" id="admin-category-icon-sub"></i></span>
                <span id="sidebar-text-category-first">Веб-сайт</span></a>
        </li>
        <br>
        @foreach($admin_categoires as $key)
            <li id="{{'#categ-admin-elem'.$key->id}}" class="admin-panel-categires-list-all" onmouseover="adminIconCat({{ $key->id }})" onmouseout="adminIconCatOut({{ $key->id }})">
                <a class="admin-panel-categires-list" href="#" target="_blank">
                    <table>
                        <tr id="{{'#sidecat'.$key->id}}">
                            <td>
                                <span id="{{'#admin-category-icon'.$key->id}}" class="admin-cat-icon-nav">{!! $key->icon !!}</span>
                            </td>
                            <td class="sidebar-text-category">
                                <span>{{ $key->name }}</span>
                            </td>
                        </tr>
                    </table>
                </a>
            </li>
        @endforeach
    </ul>
</div>


<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Добро пожаловать</h1>
                <span class="foo blue" style="margin-left: 600px;"></span><span> Онлайн</span>
                <span class="foo red"></span><span> Оффлайн</span>
            </div>


            <!-- graph -->
            <div>
                <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
            </div>
        </main>
    </div>
</div>


<div style="width: 600px; padding-left: 240px;">
    <h1>Some contents here for changes</h1>
</div>
<br><br><br><br>

<div id="footer">
    <footer style="background-color: black; color:white; text-align: center; height: 40px; padding-bottom: 5px;">
        <p style="margin-left:350px;" class="social-icons">
            <a href="#" class="icon-3"></a>
            <a href="#" class="icon-2"></a>
            <a href="#" class="icon-1"></a>
        </p>
        <span style="position: absolute !important; color:white !important; bottom:10px !important; left:600px !important;">© (current year) Grocery Store</span>
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
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<script type="text/javascript">
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