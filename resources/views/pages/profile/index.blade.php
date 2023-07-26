@extends('index')
@section('content')
    <div class="section">
        <h2 class="title">
            مدیریت پروفایل - مشخصات کاربر
            <hr>
        </h2>
        <p class="section-paragraph">
            کاربر در این بخش می بایست مشخصات خود را تکمیل نماید.
        </p>
        <div class="section-content">
            {!! Form::open(['method'=>'POST']) !!}
                <div class="frm-control">
                    {!! Form::label('password','پروفایل') !!}
                    {!! Form::file('') !!}
                </div>
                <div class="frm-control">
                    {!! Form::label('name','نام و نام خانوادگی') !!}
                    {!! Form::text('') !!}
                </div>
                <div class="frm-control">
                    {!! Form::label('phonenumber','شماره همراه') !!}
                    {!! Form::text('') !!}
                </div>
                <div class="frm-control">
                    {!! Form::label('email','پست الکترونیکی') !!}
                    {!! Form::email('') !!}
                </div>
                <div class="frm-control">
                    {!! Form::label('birthdate','تاریخ تولد') !!}
                    {!! Form::date('') !!}
                </div>
                <button class="custom-btn" type="submit">
                    ثبت
                </button>
            {!! Form::close() !!}
        </div>
    </div>
    <style>
        div.section-content{
            display: flex;
            justify-content: center;
            width: 100%;
        }
        footer{
            margin-top: 500px !important;
        }
    </style>
@endsection
