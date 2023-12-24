@php
    $setting = \App\Models\Setting::get()->last();
@endphp
@push('meta')
    <title>
        فراموشی گذرواژه - {{$setting->siteTitle}}
    </title>
@endpush
@extends('index')
@section('content')
    <div class="section">
        <h2 class="title">
            فراموشی گذرواژه
            <hr>
        </h2>
        <p class="section-paragraph">
            در این بخش می توانید با وارد کردن پست الکترونیکی، پس از بررسی پست الکترونیکی و ارسال ایمیل به آن اقدام به ویرایش گذرواژه کنید.
        </p>
        <div class="section-content">
            {!! Form::open(['route'=>['send-password-forgotten-email-action'],'method'=>'POST','id'=>'send-email-form']) !!}
                <div class="frm-control">
                    {!! Form::label('email','پست الکترونیکی') !!}
                    {!! Form::email('email') !!}
                </div>
                <button class="custom-btn" type="submit">
                    ثبت
                </button>
            {!! Form::close() !!}
            @push('script')
                <script>
                    $('#send-email-form').validate({
                        rules:{
                            email:{
                                required: true,
                                email: true,
                            },
                        },
                        messages:{
                            email:{
                                required: '.فیلد پست الکترونیکی اجباری می باشد',
                                email: 'پست الکترونیکی صحیح نمی باشد',
                            },
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
