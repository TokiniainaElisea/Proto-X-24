<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap-icons/font/bootstrap-icons.css')}}">
    <title>Proto</title>
</head>
<body>
    <script src="{{asset('js/chart.js')}}"></script>
        @include('parts.header')
    <div class="container-fluid d-flex">
            @include('parts.sidebar')
            <div class="flex-grow-1 my-2">
                @yield('content')
            </div>
    </div>
    <script src="{{asset('js/bootstrap.bundle.js')}}"></script>
</body>
</html>