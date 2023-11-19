@php
    $setting = \App\Models\Setting::get()->last();
@endphp
@push('meta')
    <title>
        تغییر گذرواژه - {{$setting->siteTitle}}
    </title>
    {{-- <meta name="description" content="{{$setting->description}}"> --}}
    {{-- <meta name="keywords" content="{{$setting->keywords}}"> --}}
    {{-- <meta property="og:title" content="مطالب آموزشی - {{$setting->siteTitle}}"> --}}
    {{-- <meta property="og:description" content="{{$setting->description}}"> --}}
    {{-- <meta property="og:url" content="{{url()->current()}}"> --}}
    {{-- <meta property="og:type" content="website"> --}}
    {{-- <meta property="og:site_name" content="{{$setting->siteTitle}}"> --}}
    {{-- <meta property="og:image" content="{{asset('storage/setting/'.$setting->siteIcon)}}"> --}}
    {{-- <meta name="twitter:title" content="مطالب آموزشی - {{$setting->siteTitle}}"> --}}
    {{-- <meta name="twitter:description" content="{{$setting->description}}"> --}}
    {{-- <meta name="twitter:image" content="{{asset('storage/setting/'.$setting->siteIcon)}}"> --}}
@endpush
@extends('index')
@section('content')
    <div class="section">
        <h2 class="title">
            مدیریت پروفایل - تغییر گذرواژه
            <hr>
        </h2>
        <p class="section-paragraph">
            در این بخش می توانید با وارد کردن گذرواژه فعلی، گذرواژه جدیدی برای حساب کاربری خود انتخاب نمایید.
        </p>
        <div class="section-content">
            {!! Form::open(['route'=>['profile.change-password-action'],'method'=>'PUT','id'=>'change-password-form']) !!}
                <div class="frm-control">
                    {!! Form::label('current_password','گذرواژه فعلی') !!}
                    {!! Form::password('current_password') !!}
                </div>
                <div class="frm-control">
                    {!! Form::label('password','گذرواژه جدید') !!}
                    {!! Form::password('password') !!}
                </div>
                <button class="custom-btn" type="submit">
                    ادامه
                </button>
            {!! Form::close() !!}
            @push('script')
                <script>
                    $('#change-password-form').validate({
                        rules:{
                            current_password:{
                                required: true
                            },
                            password:{
                                required: true,
                                minlength: 8
                            }
                        },
                        messages:{
                            current_password:{
                                required: '.فیلد گذرواژه فعلی اجباری می باشد'
                            },
                            password:{
                                required: '.فیلد گذرواژه جدید اجباری می باشد',
                                minlength: '.طول فیلد گذرواژه جدید حداقل 8 رقم می باشد'
                            }
                        },
                        submitHandler: function(form){
                            form.submit();
                        }
                    });
                </script>
            @endpush
        </div>
    </div>
    <style>
        div.section-content{
            width: 100%;

        }
        footer{
            margin-top: 500px !important;
        }
    </style>
@endsection
