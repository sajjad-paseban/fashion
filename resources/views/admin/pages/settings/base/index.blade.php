@extends('admin.index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h4 class="title p-4">
                    تنظیمات پایه
                </h4>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <x-box title="بخش عنوان سایت">
                    {!! Form::model($setting,['route'=>['admin.setting.editSiteTitle',1],'method'=>'PUT','id'=>'setting_siteTitle_edit_form','class'=>'row g-3']) !!}
                        <div class="col-auto">
                          {!! Form::label('siteTitle','عنوان سایت') !!}
                          {!! Form::text('siteTitle',null,['class'=>'form-control form-control-sm','placeholder'=>'مثال: طراحی مد با مونا - گلچین','autocomplete'=>'off']) !!}
                        </div>
                        <div class="col-auto">
                          <button type="submit" class="btn btn-sm btn-primary" style="position: relative; top:29px;">
                            ذخیره
                          </button>
                        </div>
                    {!! Form::close() !!}
                    @push('script')
                        <script>
                            $('#setting_siteTitle_edit_form').validate({
                                rules:{
                                    siteTitle:{
                                        required: true,
                                        minlength: 10,
                                        maxlength: 60
                                    }
                                },
                                messages:{
                                    siteTitle:{
                                        required: 'فیلد عنوان سایت اجباری می باشد.',
                                        minlength:'طول فیلد عنوان سایت می بایست حداقل 10 کاراکتر باشد.',
                                        maxlength:'طول فیلد عنوان سایت می بایست حداکثر 60 کاراکتر باشد.',
                                    }
                                },
                                submitHandler: function(form){
                                    form.submit();
                                }
                            })
                        </script>
                    @endpush
                </x-box>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <x-box title="بخش آیکون سایت">
                    {!! Form::model($setting,['route'=>['admin.setting.editSiteIcon',1],'method'=>'PUT','files'=>true,'id'=>'setting_siteIcon_edit_form','class'=>'row g-3']) !!}
                        <div class="col-auto">
                          {!! Form::label('siteIcon','آیکون سایت') !!}
                          {!! Form::file('siteIcon',['class'=>'form-control form-control-sm']) !!}
                        </div>
                        <div class="col-auto">
                          <button type="submit" class="btn btn-sm btn-primary" style="position: relative; top:29px;">
                            ذخیره
                          </button>
                        </div>
                    {!! Form::close() !!}
                    @if($setting->siteIcon)
                        {!! Form::open(['route'=>['admin.setting.destroy',1],'method'=>'DELETE','id'=>'delete_siteIcon_form','class'=>'py-3 pb-0']) !!}
                            <img src="{{asset('storage/setting/'.$setting->siteIcon)}}" width="50" alt="">
                            <button type="button" onclick="deleteOperation('delete_siteIcon_form')" class="btn btn-sm btn-danger mx-2">
                                حذف
                            </button>
                        {!! Form::close() !!}                        
                    @endif
                    @push('script')
                        <script>
                            $('#setting_siteIcon_edit_form').validate({
                                rules:{
                                    siteIcon:{
                                        required: true
                                    }
                                },
                                messages:{
                                    siteIcon:{
                                        required: 'فیلد آیکون سایت اجباری می باشد.'
                                    }
                                },
                                submitHandler: function(form){
                                    form.submit();
                                }
                            })
                        </script>
                    @endpush
                </x-box>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <x-box title="بخش لوگو سایت">
                    {!! Form::model($setting,['route'=>['admin.setting.editSiteLogo',$setting->id],'method'=>'PUT','files'=>true,'id'=>'setting_siteLogo_edit_form','class'=>'row g-3']) !!}
                        <div class="col-auto">
                            {!! Form::label('siteLogo','لوگو سایت') !!}
                            {!! Form::file('siteLogo',['class'=>'form-control form-control-sm']) !!}
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-sm btn-primary" style="position: relative; top:29px;">
                                ذخیره
                            </button>
                        </div>
                    {!! Form::close() !!}
                    @if($setting->siteLogo)
                        {!! Form::open(['route'=>['admin.setting.destroy',2],'method'=>'DELETE','id'=>'delete_siteLogo_form','class'=>'py-3 pb-0']) !!}
                            <img src="{{asset('storage/setting/'.$setting->siteLogo)}}" width="50" alt="">
                            <button type="button" onclick="deleteOperation('delete_siteLogo_form')" class="btn btn-sm btn-danger mx-2">
                                حذف
                            </button>
                        {!! Form::close() !!}
                    @endif
                    @push('script')
                        <script>
                            $('#setting_siteLogo_edit_form').validate({
                                rules:{
                                    siteLogo:{
                                        required: true
                                    }
                                },
                                messages:{
                                    siteLogo:{
                                        required: 'فیلد لوگو سایت اجباری می باشد.'
                                    }
                                },
                                submitHandler: function(form){
                                    form.submit();
                                }
                            })
                        </script>
                    @endpush
                </x-box>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <x-box title="بخش عنوان لوگو">
                    {!! Form::model($setting,['route'=>['admin.setting.editLogoTitle',1],'method'=>'PUT','id'=>'setting_logoTitle_edit_form','class'=>'row g-3']) !!}
                        <div class="col-auto">
                            {!! Form::label('logoTitle','عنوان لوگو') !!}
                            {!! Form::text('logoTitle',null,['class'=>'form-control form-control-sm','placeholder'=>'مثال: مونا گلچین']) !!}
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-sm btn-primary" style="position: relative; top:29px;">
                                ذخیره
                            </button>
                        </div>
                    {!! Form::close() !!}
                    @push('script')
                        <script>
                            $('#setting_logoTitle_edit_form').validate({
                                rules:{
                                    logoTitle:{
                                        required: true
                                    }
                                },
                                messages:{
                                    logoTitle:{
                                        required: 'فیلد عنوان لوگو اجباری می باشد.'
                                    }
                                },
                                submitHandler: function(form){
                                    form.submit();
                                }
                            })
                        </script>
                    @endpush
                </x-box>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <x-box title="سایر بخش ها">
                    {!! Form::model($setting,['route'=>['admin.setting.update',1],'method'=>'PUT','id'=>'setting_edit_form','class'=>'row g-3']) !!}
                        <div class="col-auto">
                            {!! Form::label('author','نویسنده') !!}
                            {!! Form::text('author',null,['class'=>'form-control form-control-sm','placeholder'=>'مثال: مونا گلچین']) !!}
                        </div>
                        <div class="col-auto">
                            {!! Form::label('keywords','کلمات کلیدی') !!}
                            {!! Form::text('keywords',null,['class'=>'form-control form-control-sm','placeholder'=>'مثال: فشن,مود,استایل,مونا گلچین']) !!}
                        </div>
                        <div class="col12">
                            {!! Form::label('footerText','متن فوتر') !!}
                            {!! Form::textarea('footerText',null,['class'=>'form-control form-control-sm']) !!}
                        </div>
                        <div class="col-12">
                            {!! Form::label('description','توضیحات') !!}
                            {!! Form::textarea('description',null,['class'=>'form-control form-control-sm']) !!}
                        </div>
                        <small class="text-muted" style="font-family: 'vazir'; font-size: 14px;">
                            تکمیل کردن اطلاعات این بخش تاثیر زیادی بروی عملکرد seo سایت شما می گذارد.
                        </small>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-sm btn-primary my-2 px-4">
                                ذخیره
                            </button>
                        </div>
                    {!! Form::close() !!}
                    @push('script')
                        <script>
                            $('#setting_edit_form').validate({
                                rules:{
                                    author:{
                                        required: true
                                    },
                                    keywords:{
                                        required: true
                                    },
                                    footerText:{
                                        required: true
                                    },
                                    description:{
                                        required: true,
                                        minlength: 30,
                                        maxlength: 160
                                    }
                                },
                                messages:{
                                    author:{
                                        required: 'فیلد نویسنده اجباری می باشد.'
                                    },
                                    keywords:{
                                        required: 'فیلد کلمات کلیدی اجباری می باشد.'
                                    },
                                    footerText:{
                                        required: 'فیلد متن فوتر اجباری می باشد.'
                                    },
                                    description:{
                                        required: 'فیلد توضیحات اجباری می باشد.',
                                        minlength:'طول فیلد توضیحات می بایست حداقل 30 کاراکتر باشد.',
                                        maxlength:'طول فیلد توضیحات می بایست حداکثر 160 کاراکتر باشد.',
                                    }
                                },
                                submitHandler: function(form){
                                    form.submit();
                                }
                            })
                        </script>
                    @endpush
                    @push('script')
                    <script>
                        function deleteOperation(id){
                            $.confirm({
                                title: 'حذف تصویر',
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
                </x-box>
            </div>
        </div>
    </div>
@endsection