@extends('admin.index')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col">
                <h4 class="title p-4">
                    مدیریت بخش ها
                </h4>
            </div>
        </div>

        @if($section->headerPhotoPath)
            {!! Form::open(['route'=>['admin.section.destroy',1],'method'=>'DELETE','id'=>'delete_headerPhoto_form','class'=>'py-3 pb-0 d-none']) !!}
            {!! Form::close() !!}                        
        @endif
        @if($section->worldPhoto)
            {!! Form::open(['route'=>['admin.section.destroy',2],'method'=>'DELETE','id'=>'delete_worldPhoto_form','class'=>'py-3 pb-0 d-none']) !!}
            {!! Form::close() !!}                        
        @endif
        @if($section->biographyPhotoPath)
            {!! Form::open(['route'=>['admin.section.destroy',4],'method'=>'DELETE','id'=>'delete_biographyPhotoPath_form','class'=>'py-3 pb-0 d-none']) !!}
            {!! Form::close() !!} 
        @endif
        <div class="row my-2">
            <div class="col">
                <x-box title="بخش هدر">
                    {!! Form::model($section,['route'=>['admin.section.update',$section->id],'method'=>'PUT','files'=>true,'id'=>'section_header_edit_form','class'=>'row g-3']) !!}
                        <div class="col-12">
                            {!! Form::label('headerFarsiTitle','عنوان فارسی') !!}
                            {!! Form::text('headerFarsiTitle',null,['class'=>'form-control form-control-sm']) !!}
                        </div>
                        <div class="col-12">
                            {!! Form::label('headerPhotoPath','آپلود تصویر') !!}
                            {!! Form::file('headerPhotoPath',['class'=>'form-control form-control-sm']) !!}
                        </div>
                        @if($section->headerPhotoPath)
                            <div class="col-12">
                                <img src="{{asset('storage/section/'.$section->headerPhotoPath)}}" width="50" alt="">
                                <button type="button" onclick="deleteOperation('delete_headerPhoto_form')" class="btn btn-sm btn-danger mx-2">
                                    حذف
                                </button>
                            </div>
                        @endif
                        <div class="col-auto">
                            {!! Form::label('headerSloganFirst','شعار(بخش اول)') !!}
                            {!! Form::text('headerSloganFirst',$section->headerSlogan ? json_decode($section->headerSlogan)->first ? json_decode($section->headerSlogan)->first : null : null ,['class'=>'form-control form-control-sm']) !!}
                        </div>
                        <div class="col-auto">
                            {!! Form::label('headerSloganSecond','شعار(بخش دوم)') !!}
                            {!! Form::text('headerSloganSecond',$section->headerSlogan ? json_decode($section->headerSlogan)->second ? json_decode($section->headerSlogan)->second : null : null,['class'=>'form-control form-control-sm']) !!}
                        </div>
                        <div class="col-auto">
                            {!! Form::label('headerSloganThird','شعار(بخش سوم)') !!}
                            {!! Form::text('headerSloganThird',$section->headerSlogan ? json_decode($section->headerSlogan)->third ? json_decode($section->headerSlogan)->third : null : null,['class'=>'form-control form-control-sm']) !!}
                        </div>
                        {!! Form::hidden('__type','1') !!}

                        <div class="col-12">
                            <button type="submit" class="btn btn-sm btn-primary">
                                ذخیره
                            </button>
                        </div>
                    {!! Form::close() !!}
                </x-box>
            </div>
        </div>
        
        <div class="row my-2">
            <div class="col">
                <x-box title="بخش دنیای مد و استایل">
                    {!! Form::model($section,['route'=>['admin.section.update',$section->id],'method'=>'PUT','files'=>true,'id'=>'setting_siteIcon_edit_form','class'=>'row g-3']) !!}

                        <div class="col-12">
                            {!! Form::label('worldPhoto','آپلود تصویر بکگراند') !!}
                            {!! Form::file('worldPhoto',['class'=>'form-control form-control-sm']) !!}
                        </div>
                        @if($section->worldPhoto)
                            <div class="col-12">
                                <img src="{{asset('storage/section/'.$section->worldPhoto)}}" width="50" alt="">
                                <button type="button" onclick="deleteOperation('delete_worldPhoto_form')" class="btn btn-sm btn-danger mx-2">
                                    حذف
                                </button>
                            </div>
                        @endif
                        <div class="col-12">
                            {!! Form::label('worldContent','محتوا') !!}
                            {!! Form::textarea('worldContent',null,['class'=>'form-control form-control-sm']) !!}
                        </div>
                        {!! Form::hidden('__type','2') !!}

                        <div class="col-auto">
                            <button type="submit" class="btn btn-sm btn-primary">
                                ذخیره
                            </button>
                        </div>

                    {!! Form::close() !!}
                </x-box>
            </div>
        </div>

        <div class="row my-2">
            <div class="col">
                <x-box title="بخش آموزش">
                    {!! Form::model($section,['route'=>['admin.section.update',$section->id],'method'=>'PUT','files'=>true,'id'=>'setting_siteIcon_edit_form','class'=>'row g-3']) !!}

                        <div class="col-12">
                            {!! Form::label('trainingContent','محتوا') !!}
                            {!! Form::textarea('trainingContent',null,['class'=>'form-control form-control-sm']) !!}
                        </div>

                        {!! Form::hidden('__type','3') !!}
                        <div class="col-auto">
                            <button type="submit" class="btn btn-sm btn-primary">
                                ذخیره
                            </button>
                        </div>

                    {!! Form::close() !!}
                </x-box>
            </div>
        </div>

        <div class="row my-2">
            <div class="col">
                <x-box title="بخش بیوگرافی">
                    {!! Form::model($section,['route'=>['admin.section.update',$section->id],'method'=>'PUT','files'=>true,'id'=>'setting_siteIcon_edit_form','class'=>'row g-3']) !!}

                        <div class="col-12">
                            {!! Form::label('biographyPhotoPath','آپلود تصویر') !!}
                            {!! Form::file('biographyPhotoPath',['class'=>'form-control form-control-sm']) !!}
                        </div>
                        @if($section->biographyPhotoPath)
                            <div class="col-12">
                                <img src="{{asset('storage/section/'.$section->biographyPhotoPath)}}" width="50" alt="">
                                <button type="button" onclick="deleteOperation('delete_biographyPhotoPath_form')" class="btn btn-sm btn-danger mx-2">
                                    حذف
                                </button>
                            </div>
                        @endif
                        <div class="col-12">
                            {!! Form::label('biographyContent','محتوا') !!}
                            {!! Form::textarea('biographyContent',null,['class'=>'form-control form-control-sm']) !!}
                        </div>
                        {!! Form::hidden('__type','4') !!}
           
                        <div class="col-auto">
                            <button type="submit" class="btn btn-sm btn-primary">
                                ذخیره
                            </button>
                        </div>

                    {!! Form::close() !!}
                </x-box>
            </div>
        </div>

        <div class="row my-2">
            <div class="col">
                <x-box title="بخش فضای مجازی">
                    {!! Form::model($section,['route'=>['admin.section.update',$section->id],'method'=>'PUT','files'=>true,'id'=>'setting_siteIcon_edit_form','class'=>'row g-3']) !!}

                        <div class="col-12">
                            {!! Form::label('socialNetworkContent','محتوا') !!}
                            {!! Form::textarea('socialNetworkContent',null,['class'=>'form-control form-control-sm']) !!}
                        </div>
                        {!! Form::hidden('__type','5') !!}
                        <div class="col-auto">
                            <button type="submit" class="btn btn-sm btn-primary">
                                ذخیره
                            </button>
                        </div>

                    {!! Form::close() !!}
                </x-box>
            </div>
        </div>

    </div>
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
@endsection