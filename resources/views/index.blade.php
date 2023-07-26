<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('dist/css/fonts.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/app.css')}}">
    <title>Document</title>
</head>
<body>
    @include('partials.header')
    <section class="content">
        @yield('content')
    </section>
    <div class="up-arrow">
        <img src="https://cdn-icons-png.flaticon.com/512/37/37926.png" alt="بالا">
    </div>
    @include('partials.footer')
    <script src="{{asset('dist/js/jquery-3.7.0.js')}}"></script>
    <script src="{{asset('dist/js/jquery.validate.js')}}"></script>
    <script src="{{asset('dist/js/app.js')}}"></script>
</body>
</html>
