@php
    $buttons = [['name'=>'نمایش تمام پست ها','href'=>route('admin.post.index')]]
@endphp
@extends('admin.index')

@section('content')
    @push('style')

    @endpush
    {!! Form::open(['route'=>'admin.post.store','method'=>'POST','files'=>true,'id'=>'post_create_form']) !!}
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h4 class="title p-4">
                        مدیریت پست ها - جدید
                    </h4>
                </div>
            </div>
            <div class="row card my-2 mx-0 py-3 px-1">
                <div class="col-12 d-flex justify-content-between">
                    <button class="btn btn-sm btn-primary" type="submit">
                        ذخیره
                    </button>
                    <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        آپلود ویدیو و عکس
                    </button>
                    <!-- Modal -->
                    <div class="modal fade modal-xl" id="exampleModal">
                        <div class="modal-dialog">
                            <div class="modal-content" dir="rtl">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">آپلود ویدیو و عکس</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <iframe src="http://localhost/fashion/public/administrator/media" style="border:none;height: 100vh; width:100%;" title="Iframe Example"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <x-box title="پست جدید" :buttons="$buttons">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {!! Form::label('title','عنوان') !!}
                                    {!! Form::text('title',null,['class'=>'form-control form-control-sm','placeholder'=>'مثال: طراحی لباس های اروپایی و مدرن','autocomplete'=>'off']) !!}
                                </div>
                                <div class="form-group my-3">
                                    {!! Form::label('path','آپلود تصویر') !!}
                                    {!! Form::file('path',['class'=>'form-control form-control-sm']) !!}
                                </div>
                                <div class="form-group my-3">
                                    {!! Form::label('category_id','دسته بندی') !!}
                                    <select name="category_id" id="category_id" class="form-select form-select-sm" autocomplete="off">
                                        <option value="" selected>یک گزینه را انتخاب نمایید</option>
                                        @foreach ($categories as $item)
                                            <option value="{{$item->id}}">{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        {!! Form::checkbox('status', null, true,['class'=>'form-check-input']) !!}
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
                                {!! Form::label('seoTitle','عنوان پست') !!}
                                {!! Form::text('seoTitle',null,['class'=>'form-control form-control-sm','placeholder'=>'مثال: طراحی دوخت لباس های مدرن','autocomplete'=>'off']) !!}
                            </div>
                            <div class="form-group my-2">
                                {!! Form::label('slug','(slug) اسلاگ') !!}
                                {!! Form::text('slug',null,['class'=>'form-control form-control-sm','placeholder'=>'مثال: طراحی-دوخت-لباس-های-مدرن','autocomplete'=>'off']) !!}
                            </div>
                            <div class="form-group my-2">
                                {!! Form::label('keywords','کلمات کلیدی') !!}
                                {!! Form::text('keywords',null,['class'=>'form-control form-control-sm','placeholder'=>'مثال: طراحی لباس,لباس مردن,دوخت','autocomplete'=>'off']) !!}
                            </div>
                            <div class="form-group my-2">
                                {!! Form::label('description','توضیحات') !!}
                                {!! Form::textarea('description',null,['class'=>'form-control form-control-sm','placeholder'=>'مثال: طراحی لباس یک شیوه هنری است که مختص به طراحی پوشاک می باشد. طراحی لباس مدرن به دو دسته اساسی تقسیم شده است: لباس های مجلسی و آماده.','autocomplete'=>'off']) !!}
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

            $('#post_create_form').validate({
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
                    document.getElementById('content').innerHTML = tinymce.get('content').getContent();
                    form.submit();
                }
            });
        </script>
    @endpush
@endsection