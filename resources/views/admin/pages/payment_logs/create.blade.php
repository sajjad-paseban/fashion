@php
    $buttons = [['name'=>'نمایش تمام گزارشات پرداختی ها','href'=>route('admin.payment_logs.index')]]
@endphp
@extends('admin.index')

@section('content')
    @push('style')

    @endpush
    {!! Form::open(['route'=>'admin.payment_logs.store','method'=>'POST','id'=>'payment_logs_create_form']) !!}
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h4 class="title p-4">
                        مدیریت گزارش پرداختی ها - جدید
                    </h4>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <x-box title="گزارش پرداخت جدید" :buttons="$buttons">
                        <div class="row">
                            <div class="col">
                                <div class="form-group my-3">
                                    {!! Form::label('post_id','نام محصول') !!}
                                    <select name="post_id" id="post_id" class="form-select form-select-sm" autocomplete="off">
                                        <option value="" selected>یک گزینه را انتخاب نمایید</option>
                                        @foreach ($posts as $item)
                                            <option value="{{$item->id}}">{{$item->title}}</option>
                                        @endforeach 
                                    </select>
                                </div>
                                <div class="form-group my-3">
                                    {!! Form::label('user_id','نام کاربر') !!}
                                    <select name="user_id" id="user_id" class="form-select form-select-sm" autocomplete="off">
                                        <option value="" selected>یک گزینه را انتخاب نمایید</option>
                                        @foreach ($users as $item)
                                            <option value="{{$item->id}}">{{$item->name ." - ". ($item->email ? $item->email : $item->phone)}}</option>
                                        @endforeach 
                                    </select>
                                </div>
                                <div class="form-group my-3">
                                    {!! Form::label('amount','مبلغ پرداخت') !!}
                                    {!! Form::text('amount',null,['class'=>'form-control form-control-sm','placeholder'=>'مثال: 20000000','autocomplete'=>'off','onkeypress'=>'return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))']) !!}
                                </div>
                                <div class="form-group my-3">
                                    {!! Form::label('trans_id','کد معامله') !!}
                                    {!! Form::text('trans_id',null,['class'=>'form-control form-control-sm','placeholder'=>'مثال: 6985288','autocomplete'=>'off','onkeypress'=>'return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))']) !!}
                                </div>
                                <div class="form-group my-3">
                                    {!! Form::label('tracking_number','کد رهگیری') !!}
                                    {!! Form::text('tracking_number',null,['class'=>'form-control form-control-sm','placeholder'=>'مثال: 52235555555699941','autocomplete'=>'off','onkeypress'=>'return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))']) !!}
                                </div>
                                <div class="form-group my-3">
                                    {!! Form::label('card_number','شماره کارت') !!}
                                    {!! Form::text('card_number',null,['class'=>'form-control form-control-sm','placeholder'=>'مثال: 6062561000265926','autocomplete'=>'off','onkeypress'=>'return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))']) !!}
                                </div>
                                <div class="form-group my-3">
                                    {!! Form::label('bank','نام بانک') !!}
                                    {!! Form::text('bank',null,['class'=>'form-control form-control-sm','placeholder'=>'مثال: بانک ملت','autocomplete'=>'off']) !!}
                                </div>
                                <div class="form-group my-3">
                                    <div class="form-check">
                                        {!! Form::checkbox('status', null, true,['class'=>'form-check-input']) !!}
                                        {!! Form::label('status','آیا پرداخت انجام شده است؟',['class'=>'form-check-label']) !!}
                                      </div>
                                    <div>
                                </div>
                                <div class="form-group mb-5">
                                    <button class="btn btn-sm btn-primary" style="position: relative;top: 26px;">
                                        ذخیره
                                    </button>
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
            $('#payment_logs_create_form').validate({
                rules:{
                    post_id:{
                        required: true
                    },
                    user_id:{
                        required: true
                    },
                    amount:{
                        required: true
                    },
                    trans_id:{
                        required: true
                    },
                    tracking_number:{
                        required: true
                    },
                    card_number:{
                        required: true
                    },
                    bank:{
                        required: true
                    }
                },
                messages:{
                    post_id:{
                        required: 'یکی از گزینه های زیر را انتخاب نمایید'
                    },
                    user_id:{
                        required: 'یکی از گزینه های زیر را انتخاب نمایید'
                    },
                    amount:{
                        required: 'فیلد مبلغ محصول اجباری می باشد'
                    },
                    trans_id:{
                        required: 'فیلد کد معامله اجباری می باشد'
                    },
                    tracking_number:{
                        required: 'فیلد کد رهگیری اجباری می باشد'
                    },
                    card_number:{
                        required: 'فیلد شماره کارت اجباری می باشد'
                    },
                    bank:{
                        required: 'فیلد نام بانک اجباری می باشد'
                    }
                },
                submitHandler: function(form){
                    form.submit();
                }
            });
        </script>
    @endpush
@endsection