@php
    $buttons = [['name'=>'نمایش تمام صفحات','href'=>route('admin.page.index')],['name'=>'صفحه جدید','href'=>route('admin.page.create')]]
@endphp
@extends('admin.index')

@section('content')
    @push('style')

    @endpush
    {!! Form::model($page,['route'=>['admin.page.update',$page->id],'method'=>'PUT','id'=>'page_edit_form']) !!}
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h4 class="title p-4">
                        مدیریت صفحات - ویرایش
                    </h4>
                </div>
            </div>
            <div class="row card my-2 mx-0 py-3 px-1">
                <div class="col-12 d-flex justify-content-between">
                    <button class="btn btn-sm btn-primary" type="submit">
                        بروزرسانی
                    </button>
                    <button class="btn btn-sm btn-primary" type="submit">
                        آپلود ویدیو و عکس
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <x-box title="ویرایش صفحه" :buttons='$buttons'>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {!! Form::label('title','عنوان') !!}
                                    {!! Form::text('title',null,['class'=>'form-control form-control-sm','placeholder'=>'مثال: طراحی لباس های اروپایی و مدرن','autocomplete'=>'off']) !!}
                                </div>
                                <div class="form-group my-3">
                                    <div class="form-check">
                                        {!! Form::checkbox('status', null, $page->status == true ? true : false,['class'=>'form-check-input']) !!}
                                        {!! Form::label('status','آیا فعال باشد؟',['class'=>'form-check-label']) !!}
                                      </div>
                                    <div>
                                </div>
                                <div class="form-group my-2">
                                    <p style="text-align: right; font-family: 'vazir';position: relative;top:5px;user-select: none;">متن</p>
                                    {!! Form::textarea('content',null,['class'=>'form-control form-control-sm w-100','id'=>'content','autocomplete'=>'off']) !!}
                                </div>
                            </div>
                        </div>
                    </x-box>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <x-box title="تنظیمات سئو محتوا">
                    <div class="row">
                        <div class="col">
                            <div class="form-group my-2">
                                {!! Form::label('seoTitle','عنوان صفحه') !!}
                                {!! Form::text('seoTitle',$page->seo->title,['class'=>'form-control form-control-sm','placeholder'=>'مثال: طراحی دوخت لباس های مدرن','autocomplete'=>'off']) !!}
                            </div>
                            <div class="form-group my-2">
                                {!! Form::label('slug','(slug) اسلاگ') !!}
                                {!! Form::text('slug',$page->seo->slug,['class'=>'form-control form-control-sm','placeholder'=>'مثال: طراحی-دوخت-لباس-های-مدرن','autocomplete'=>'off']) !!}
                            </div>
                            <div class="form-group my-2">
                                {!! Form::label('keywords','کلمات کلیدی') !!}
                                {!! Form::text('keywords',$page->seo->keywords,['class'=>'form-control form-control-sm','placeholder'=>'مثال: طراحی لباس,لباس مردن,دوخت','autocomplete'=>'off']) !!}
                            </div>
                            <div class="form-group my-2">
                                {!! Form::label('description','توضیحات') !!}
                                {!! Form::textarea('description',$page->seo->description,['class'=>'form-control form-control-sm','placeholder'=>'مثال: طراحی لباس یک شیوه هنری است که مختص به طراحی پوشاک می باشد. طراحی لباس مدرن به دو دسته اساسی تقسیم شده است: لباس های مجلسی و آماده.','autocomplete'=>'off']) !!}
                            </div>
                        </div>
                    </div>
                </x-box>
            </div>
        </div>
    {!! Form::close() !!}
    @push('script')
        <script src="{{asset('admin/tinymce/tinymce.min.js')}}"></script>
        <script>
            tinymce.init({
                selector: '#content',
                height: 500,
                resize: false,
                placeholder: 'بنویس...',
                language: 'fa',
                highlight_on_focus: true,
                plugins:'lists link autolink image advlist preview code table wordcount media',
                toolbar: 'undo redo | link image media | copy cut paste | fontsize forecolor | code | blocks | bold italic underline  | alignleft aligncenter alignjustify alignright blockquote backcolor | indent outdent | bullist numlist | code | table'
            })

            document.getElementsByName('seoTitle')[0].oninput = (e)=>{
                var slug = e.target.value.replaceAll(' ','-')
                document.getElementsByName('slug')[0].value = slug;
            }

            $('#page_edit_form').validate({
                rules:{
                    title:{
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
                    document.getElementById('content').innerHTML = tinymce.get('content').getContent();
                    form.submit();
                }
            });
        </script>
    @endpush
@endsection