<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{asset('admin/assets/bootstrap/css/bootstrap.rtl.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/bootstrap/css/bootstrap-grid.rtl.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/bootstrap/css/bootstrap-reboot.rtl.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/bootstrap/css/bootstrap-utilities.rtl.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/app.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/fonts.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
</head>
<body>
    <section class="content">
        @include('admin.partials.header')
        @yield('content')
    </section>
    <section class="menu">
        @include('admin.partials.menu')
    </section>
    
    
    <script src="{{asset('admin/assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('dist/js/jquery-3.7.0.js')}}"></script>
    <script src="{{asset('dist/js/jquery.validate.js')}}"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="{{asset('admin/js/app.js')}}"></script>
    @stack('script')
</body>
</html>