@php
    $setting = \App\Models\Setting::get()->last();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta property="og:locale" content="fa_IR">
    <meta property="og:type" content="website">
    <meta name="author" content="{{$setting->author}}">
    <meta name="robots" content="index, follow">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="{{$setting->siteTitle}}">
    @stack('meta')
    @if ($setting->siteIcon)
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('storage/setting/'.$setting->siteIcon)}}">
    @endif
    <link href="https://www.monagolchin.ir/" rel="canonical">
    <link rel="stylesheet" href="{{asset('utils/plyr/plyr.css')}}" />
    <link rel="stylesheet" href="{{asset('utils/datepicker/jalalidatepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('utils/google_icons/icons.css')}}" />    
    <link rel="stylesheet" href="{{asset('dist/css/fonts.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/Toast.css')}}">
</head>
<body>
    @include('partials.header')
    <section class="content">
        @yield('content')
    </section>
    <div class="up-arrow">
        <img src="{{asset('icons/up_arrow.png')}}" alt="بالا">
    </div>
    @include('partials.footer')
    <script src="{{asset('dist/js/jquery-3.7.0.js')}}"></script>
    <script src="{{asset('dist/js/jquery.validate.js')}}"></script>
    <script src="{{asset('dist/js/app.js')}}"></script>
    <script src="{{asset('utils/plyr/plyr.js')}}"></script>
    <script src="{{asset('admin/js/Toast.js')}}"></script>
    <script type="text/javascript" src="{{asset('utils/datepicker/jalalidatepicker.min.js')}}"></script>
    @stack('script')
    @include('notification')
</body>
</html>
