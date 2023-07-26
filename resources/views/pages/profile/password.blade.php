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
            {!! Form::open(['method'=>'POST']) !!}
                <div class="frm-control">
                    {!! Form::label('password','گذرواژه') !!}
                    {!! Form::password('') !!}
                </div>
                <button class="custom-btn" type="submit">
                    ادامه
                </button>
            {!! Form::close() !!}
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
