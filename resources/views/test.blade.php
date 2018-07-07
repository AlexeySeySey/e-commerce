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
    <style>
        .sosTest-enter-active {
            animation: bounceIn 2s;
        }

        .sosTest-leave-active {
            animation: bounceIn 2s reverse;
        }

        @keyframesbounceIn {
            0% {
                transform: scale(0.1);
                opacity: 0;
            }
            60% {
                transform: scale(1.2);
                opacity: 0.5;

            }
            100% {
                opacity: 1;
            }
        }
    </style>
</head>

<body>

    <div class="alert alert-success">
        <div id="app">
            <navbar></navbar>
            <transition name="sosTest">
                <Ses></Ses>
            </transition>
        </div>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>

</html>
