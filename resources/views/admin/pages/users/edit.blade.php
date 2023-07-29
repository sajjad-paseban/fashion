@php
    $buttons = [['name'=>'نمایش تمام کاربران','href'=>route('admin.user.index')],['name'=>'کاربر جدید','href'=>route('admin.user.create')]]
@endphp
@extends('admin.index')

@section('content')
    @push('style')

    @endpush
    @if ($user->photo_path)
       {!! Form::open(['route'=>['admin.user.deletePhoto',$user->id],'method'=>'PUT','class'=>'d-none','id'=>'deletePhoto']) !!}
        {!! Form::close() !!}
    @endif
    {!! Form::model($user,['route'=>['admin.user.update',$user->id],'method'=>'PUT','id'=>'user_edit_form']) !!}
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h4 class="title p-4">
                        مدیریت کاربران - ویرایش
                    </h4>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <x-box title="ویرایش کاربر" :buttons="$buttons">
                        <div class="row" dir="rtl">
                            <div class="col-12 mb-3 d-flex justify-content-center">
                                <div class="user-p">
                                    <div>
                                        <img src="{{$user->photo_path ? asset('storage/user/'.$user->photo_path) : 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/1024px-Default_pfp.svg.png'}}" id="photo_img_tag" class="d-block" alt="">
                                        @if ($user->photo_path)
                                            <button class="btn btn-sm btn-outline-danger px-1 py-0" type="button" onclick="deleteOperation('deletePhoto')">
                                                <span class="material-symbols-outlined" style="position: relative;top:3px;">delete</span>
                                            </button>
                                        @endif
                                        <button type="button" id="upload" class="btn btn-sm btn-outline-primary px-1 py-0" style="{{$user->photo_path ? '' : 'position: relative;right:58px;'}}">
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
                                {!! Form::text('phonenumber',null,['class'=>'form-control form-control-sm','placeholder'=>'مثال: ---09374812','autocomplete'=>'off']) !!}
                            </div>
                            <div class="col-auto">
                                {!! Form::label('email','پست الکترونیکی') !!}
                                {!! Form::email('email',null,['class'=>'form-control form-control-sm text-f-right','autocomplete'=>'off','placeholder'=>'s.pr98@yahoo.com :مثال']) !!}
                            </div>
                            <div class="col-auto">
                                {!! Form::label('birthdate','تاریخ تولد') !!}
                                {!! Form::date('birthdate',null,['class'=>'form-control form-control-sm','autocomplete'=>'off']) !!}
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
                                    {!! Form::checkbox('status', null, $user->status == true ? true : false,['class'=>'form-check-input']) !!}
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

            $('#user_edit_form').validate({
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

            function deleteOperation(id){
                $.confirm({
                    title: 'حذف تصویر پروفایل',
                    content: 'آیا از حذف این آیتم مطمعن هستید؟',
                    buttons: {
                        "بله": function () {
                            document.getElementById(id).submit()
                        },
                        "خیر": function () {

                        }
                    }
                });
            }
        </script>
    @endpush
@endsection