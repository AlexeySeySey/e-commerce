<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet" type="text/css" media="all" />
</head>
{{--
-Нажал на кнопку - появилась форма, нажал еще раз - пропала.
-Внеси классы в компонент для смены стилей в зависимости от нажатий
-В форме можно выбрать - 1 наследника вьюхи, или второго (2 кнопки)
-Запрос идет через axios, получаем наследника-вьюху без перезагрузки страницы
--}}

<body>

<header>
    <div class="alert alert-secondary">
        This is header
        <br>
        <button class="btn btn-primary">*</button>
        <button class="btn btn-primary">*</button>
        <button class="btn btn-primary">*</button>
    </div>
</header>


<div id="test">
    <form-custom></form-custom>
</div>

@section('tst')
@show



    <script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>

</html>
