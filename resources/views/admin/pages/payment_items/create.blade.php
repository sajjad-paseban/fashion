@php
    $buttons = [['name'=>'نمایش تمام محصولات قیمت گذاری شده','href'=>route('admin.payment_items.index')]]
@endphp
@extends('admin.index')

@section('content')
    @push('style')

    @endpush
    {!! Form::open(['route'=>'admin.payment_items.store','method'=>'POST','id'=>'payment_items_create_form']) !!}
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h4 class="title p-4">
                        مدیریت قیمت گذاری محصولات - جدید
                    </h4>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <x-box title="قیمت گذاری محصول جدید" :buttons="$buttons">
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
                                <div class="form-group">
                                    {!! Form::label('amount','مبلغ محصول') !!}
                                    {!! Form::text('amount',null,['class'=>'form-control form-control-sm','placeholder'=>'مثال: 20000000','autocomplete'=>'off','onkeypress'=>'return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))']) !!}
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
            $('#payment_items_create_form').validate({
                rules:{
                    post_id:{
                        required: true
                    },
                    amount:{
                        required: true
                    }
                },
                messages:{
                    post_id:{
                        required: 'یکی از گزینه های زیر را انتخاب نمایید'
                    },
                    amount:{
                        required: 'فیلد مبلغ محصول اجباری می باشد'
                    }
                },
                submitHandler: function(form){
                    form.submit();
                }
            });
        </script>
    @endpush
@endsection