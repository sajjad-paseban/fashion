@php
    $buttons = [['name'=>'نمایش تمام دسته بندی ها','href'=>route('admin.category.index')]]
@endphp
@extends('admin.index')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h4 class="title p-3">
                مدیریت دسته بندی - جدید
            </h4>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <x-box title="دسته بندی جدید" :buttons="$buttons">
                {!! Form::open(['route'=>'admin.category.store','method'=>'POST','id'=>'category_create_form','class'=>'row g-3']) !!}
                    <div class="form-group">
                        {!! Form::label('title','عنوان') !!}
                        {!! Form::text('title',null,['class'=>'form-control form-control-sm','placeholder'=>'مثال: آموزش','autocomplete'=>'off']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('parent_id','زیر مجموعه') !!}
                        <select name="parent_id" id="parent_id" class="form-select form-select-sm" autocomplete="off">
                            <option value="0" selected>خودش</option>
                            @foreach ($categories as $item)
                                @if ($item->status == true)
                                    <option value="{{$item->id}}">{{$item->title}}</option>                                
                                @endif
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
                    <br>
                    <div class="col-auto">
                      <button type="submit" class="btn btn-sm btn-primary">
                        ذخیره
                      </button>
                    </div>
                {!! Form::close() !!}
                @push('script')
                    <script>
                        $('#category_create_form').validate({
                            rules:{
                                title:{
                                    required: true
                                },
                                parent_id:{
                                    required: true
                                }
                            },
                            messages:{
                                title:{
                                    required: 'فیلد عنوان اجباری می باشد.'
                                },
                                parent_id:{
                                    required: 'فیلد زیر مجموعه اجباری می باشد.'
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
</div>
@endsection