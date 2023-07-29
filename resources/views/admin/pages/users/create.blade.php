@php
    $buttons = [['name'=>'نمایش تمام کاربران','href'=>route('admin.user.index')]]
@endphp
@extends('admin.index')

@section('content')
    @push('style')

    @endpush
    {!! Form::open(['route'=>'admin.user.store','files'=>true,'method'=>'POST','id'=>'user_create_form']) !!}
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h4 class="title p-4">
                        مدیریت کاربران - جدید
                    </h4>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <x-box title="کاربر جدید" :buttons="$buttons">
                        <div class="row" dir="rtl">
                            <div class="col-12 mb-3 d-flex justify-content-center">
                                <div class="user-p">
                                    <div>
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/1024px-Default_pfp.svg.png" id="photo_img_tag" class="d-block" alt="">
                                        <button type="button" id="upload" class="btn btn-sm btn-outline-primary px-1 py-0" style="right: 58px;">
                                            <span class="material-symbols-outlined" style="position: relative;top:3px;">upload</span>
                                        </button>
                                    </div> 
                                    {!! Form::file('photo_path',['class'=>'form-control form-control-sm d-none','id'=>'photo_path','style'=>'position: relative; bottom: 0px;','placeholder'=>'مثال: https://t.me/fashion']) !!}
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                {!! Form::label('name','نام کاربر') !!}
                                {!! Form::text('name',null,['class'=>'form-control form-control-sm','placeholder'=>'مثال: مونا گلچین','autocomplete'=>'off']) !!}
                            </div>
                            <div class="col-auto">
                                {!! Form::label('phonenumber','شماره همراه') !!}
                                {!! Form::text('phonenumber',null,['oninput'=>'this.value = this.value.replace(/[^0-9]/g,"")','class'=>'form-control form-control-sm','placeholder'=>'مثال: ---09374812','autocomplete'=>'off']) !!}
                            </div>
                            <div class="col-auto">
                                {!! Form::label('email','پست الکترونیکی') !!}
                                {!! Form::email('email',null,['class'=>'form-control form-control-sm text-f-right','autocomplete'=>'off','placeholder'=>'s.pr98@yahoo.com :مثال']) !!}
                            </div>
                            <div class="col-auto">
                                {!! Form::label('birthdate','تاریخ تولد') !!}
                                {!! Form::date('birthdate',\Date::now(),['class'=>'form-control form-control-sm','autocomplete'=>'off']) !!}
                            </div>
                            <div class="col-auto">
                                {!! Form::label('password','گذرواژه') !!}
                                {!! Form::password('password',['class'=>'form-control form-control-sm','autocomplete'=>'off']) !!}
                            </div>
                            <div class="col-auto">
                                {!! Form::label('is_admin','نقش') !!}
                                {!! Form::select('is_admin',[0=>'کاربر ساده',1=>'مدیر'],null,['class'=>'form-select form-select-sm','autocomplete'=>'off']) !!}
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-sm btn-primary" style="position: relative;top: 26px;">
                                    ذخیره
                                </button>
                            </div>
                            <div class="form-group my-3">
                                <div class="form-check">
                                    {!! Form::checkbox('status', null, true,['class'=>'form-check-input']) !!}
                                    {!! Form::label('status','آیا فعال باشد؟',['class'=>'form-check-label']) !!}
                                    </div>
                                <div>
                            </div>
                        </div>
                    </x-box>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
    @push('script')
        <script>

            $('#user_create_form').validate({
                rules:{
                    name:{
                        required: true
                    },
                    phonenumber:{
                        required: true,
                        minlength: 11,
                        maxlength: 11
                    },
                    email:{
                        required: true
                    },
                    password:{
                        required: true,
                        minlength: 8
                    }
                },
                messages:{
                    name:{
                        required: 'فیلد نام کاربر اجباری می باشد.'
                    },
                    phonenumber:{
                        required: 'فیلد شماره همراه اجباری می باشد.',
                        minlength: 'طول فیلد شماره همراه حداقل 11 کاراکتر می باشد.',
                        maxlength: 'طول فیلد شماره همراه حداکثر 11 کاراکتر می باشد.'
                    },
                    email:{
                        required: 'فیلد پست الکترونیکی اجباری می باشد'
                    },
                    password:{
                        required: 'فیلد گذرواژه اجباری می باشد.',
                        minlength: 'طول فیلد گذرواژه حداقل 8 کاراکتر می باشد.'
                    }
                },
                submitHandler: function(form){
                    form.submit();
                }
            });

            $('#upload').on('click',function(){
                $('[name=photo_path]').trigger('click');
            })
            
            const imageUpload = document.getElementById('photo_path');

            imageUpload.addEventListener('change', function(event) {
                const file = event.target.files[0];

                const reader = new FileReader();

                reader.onload = function(e) {
                    const imageDataUrl = e.target.result;

                    const uploadedImage = document.getElementById('photo_img_tag');
                    uploadedImage.src = imageDataUrl;
                };

                reader.readAsDataURL(file);
            });

        </script>
    @endpush
@endsection