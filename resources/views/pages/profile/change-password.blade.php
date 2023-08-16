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
