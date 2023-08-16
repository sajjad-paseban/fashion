@extends('index')
@section('content')
    <div class="section">
        <h2 class="title">
            مدیریت پروفایل - انتخاب گذرواژه
            <hr>
        </h2>
        <p class="section-paragraph">
            گذرواژه ای برای حساب کاربری خود انتخاب نمایید.
        </p>
        <div class="section-content">
            {!! Form::open(['route'=>['profile.password-action'],'method'=>'PUT','id'=>'password_form']) !!}
                <div class="frm-control">
                    {!! Form::label('password','گذرواژه') !!}
                    {!! Form::password('password') !!}
                </div>
                <button class="custom-btn" type="submit">
                    ادامه
                </button>
            {!! Form::close() !!}
            @push('script')
                <script>
                    $('#password_form').validate({
                        rules:{
                            password:{
                                required: true,
                                minlength: 8
                            }
                        },
                        messages:{
                            password:{
                                required: '.فیلد گذرواژه اجباری می باشد',
                                minlength: '.طول فیلد گذرواژه حداقل 8 رقم می باشد'
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
