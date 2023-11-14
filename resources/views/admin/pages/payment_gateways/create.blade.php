@php
    $buttons = [['name'=>'نمایش تمام درگاه های پرداخت','href'=>route('admin.payment_gateways.index')]]
@endphp
@extends('admin.index')

@section('content')
    @push('style')

    @endpush
    {!! Form::open(['route'=>'admin.payment_gateways.store','method'=>'POST','files'=>true,'id'=>'payment_gateways_create_form']) !!}
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h4 class="title p-4">
                        مدیریت درگاه های پرداخت - جدید
                    </h4>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <x-box title="پست جدید" :buttons="$buttons">
                        <div class="row">
                            <div class="col">
                                <div class="form-group my-3">
                                    {!! Form::label('category_id','سیستم درگاه پرداخت') !!}
                                    <select name="category_id" id="category_id" class="form-select form-select-sm" autocomplete="off">
                                        <option value="" selected>یک گزینه را انتخاب نمایید</option>
                                        @foreach ($payment_systems as $item)
                                            <option value="{{$item->id}}">{{$item->title}}</option>
                                        @endforeach 
                                    </select>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('title','عنوان') !!}
                                    {!! Form::text('title',null,['class'=>'form-control form-control-sm','placeholder'=>'مثال: بانک ملت','autocomplete'=>'off']) !!}
                                </div>
                                <div class="form-group my-3">
                                    {!! Form::label('img_path','آپلود آیکون') !!}
                                    {!! Form::file('img_path',['class'=>'form-control form-control-sm']) !!}
                                </div>
                                <div class="form-group my-3">
                                    {!! Form::label('callback_url','پیوند برگشتی') !!}
                                    {!! Form::text('callback_url',null,['class'=>'form-control form-control-sm','placeholder'=>'مثال: https://localhost/successful','autocomplete'=>'off']) !!}
                                </div>
                                <div class="form-group my-3">
                                    {!! Form::label('pin','پین') !!}
                                    {!! Form::text('pin',null,['class'=>'form-control form-control-sm','placeholder'=>'مثال: 212145522','autocomplete'=>'off']) !!}
                                </div>
                                <div class="form-group my-3">
                                    {!! Form::label('account_number','شماره حساب کاربری') !!}
                                    {!! Form::text('account_number',null,['class'=>'form-control form-control-sm','placeholder'=>'مثال: AP.0522563362','autocomplete'=>'off']) !!}
                                </div>
                                <div class="form-group my-3">
                                    {!! Form::label('code','کد رمزنگاری') !!}
                                    {!! Form::text('code',null,['class'=>'form-control form-control-sm','placeholder'=>'مثال: gf@ads!p005','autocomplete'=>'off']) !!}
                                </div>
                                <div class="form-group my-3">
                                    <div class="form-check">
                                        {!! Form::checkbox('status', null, true,['class'=>'form-check-input']) !!}
                                        {!! Form::label('status','آیا فعال باشد؟',['class'=>'form-check-label']) !!}
                                      </div>
                                    <div>
                                </div>
                            </div>
                        </div>
                    </x-box>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
    @push('script')
        <script>
            $('#payment_gateways_create_form').validate({
                rules:{
                    title:{
                        required: true
                    },
                    category_id:{
                        required: true
                    },
                    seoTitle:{
                        required: true,
                        minlength: 10,
                        maxlength: 60
                    },
                    slug:{
                        required: true
                    },
                    description:{
                        minlength: 20,
                        maxlength: 160
                    }
                },
                messages:{
                    title:{
                        required: 'فیلد عنوان اجباری می باشد.'
                    },
                    category_id:{
                        required: 'فیلد دسته بندی اجباری می باشد.'
                    },
                    seoTitle:{
                        required: 'فیلد عنوان سئو اجباری می باشد.',
                        minlength: 'طول فیلد عنوان سئو حداقل 10 کاراکتر می باشد.',
                        maxlength: 'طول فیلد عنوان سئو حداکثر 60 کاراکتر می باشد.'
                    },
                    slug:{
                        required: 'فیلد اسلاگ اجباری می باشد'
                    },
                    description:{
                        minlength: 'طول فیلد توضیحات حداقل 20 کاراکتر می باشد.',
                        maxlength: 'طول فیلد توضیحات حداکثر 160 کاراکتر می باشد.'
                    }
                },
                submitHandler: function(form){
                    form.submit();
                }
            });
        </script>
    @endpush
@endsection