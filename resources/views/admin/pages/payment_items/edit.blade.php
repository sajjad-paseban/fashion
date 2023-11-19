@php
    $buttons = [['name'=>'نمایش تمام محصولات قیمت گذاری شده','href'=>route('admin.payment_items.index')]]
@endphp
@extends('admin.index')

@section('content')
    @push('style')

    @endpush
    {!! Form::model($payment_item,['route'=>['admin.payment_items.update',$payment_item->id],'method'=>'PUT','id'=>'payment_items_edit_form']) !!}
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h4 class="title p-4">
                        مدیریت قیمت گذاری محصولات - ویرایش
                    </h4>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <x-box title="ویرایش قیمت محصول" :buttons="$buttons">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {!! Form::label('amount','مبلغ محصول') !!}
                                    {!! Form::text('amount',null,['class'=>'form-control form-control-sm','placeholder'=>'مثال: 20000000','autocomplete'=>'off' ,'onkeypress'=>'return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))']) !!}
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
            $('#payment_items_edit_form').validate({
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