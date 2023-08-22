@php
    $setting = \App\Models\Setting::get()->last();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="{{$setting->author}}">
    <meta name="robots" content="index, follow">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="{{$setting->siteTitle}}">
    @stack('meta')
    @if ($setting->siteIcon)
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('storage/setting/'.$setting->siteIcon)}}">
    @endif

    <link rel="stylesheet" href="https://unpkg.com/@majidh1/jalalidatepicker/dist/jalalidatepicker.min.css">
    
    <link rel="stylesheet" href="{{asset('dist/css/fonts.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/app.css')}}">
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
    <script type="text/javascript" src="https://unpkg.com/@majidh1/jalalidatepicker/dist/jalalidatepicker.min.js"></script>
    @stack('script')
</body>
</html>
