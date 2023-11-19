@extends('admin.index')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h4 class="title p-3">
                فضای مجازی - ویرایش
            </h4>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="custom-card show-content">
                <div class="custom-card-header">
                    <div class="buttons">
                        <div class="default-buttons">
                            <button class="remove">
                                <span class="material-symbols-outlined">
                                    remove
                                </span>
                            </button>
                            <button class="add">
                                <span class="material-symbols-outlined">
                                    add
                                </span>
                            </button>
                        </div>
                        <div class="custom-buttons">
                            <a class="btn btn-sm btn-primary" href="{{route('admin.social.index')}}">
                                نمایش تمامی شبکه ها
                            </a>
                            <a class="btn btn-sm btn-primary" href="{{route('admin.social.create')}}">
                                شبکه جدید
                            </a>
                        </div>
                    </div>
                    <h6>
                        شبکه مجازی - ویرایش
                    </h6>
                </div>
                <div class="custom-card-body">
                    {!! Form::model($network,['route'=>['admin.social.update',$network->id],'files'=>'true','method'=>'PUT','id'=>'social_edit_form','class'=>'row g-3']) !!}
                        <div class="col-auto">
                          {!! Form::label('name','عنوان') !!}
                          {!! Form::text('name',null,['class'=>'form-control form-control-sm','placeholder'=>'مثال: تلگرام','autocomplete'=>'off']) !!}
                        </div>
                        <div class="col-auto">
                          {!! Form::label('link','پیوند(لینک)') !!}
                          {!! Form::text('link',null,['class'=>'form-control form-control-sm','placeholder'=>'مثال: https://t.me/fashion','autocomplete'=>'off']) !!}
                        </div>
                        <div class="col-auto">
                            <div>
                                {!! Form::label('icon_path','آپلود آیکون') !!}
                                {!! Form::file('icon_path',['class'=>'form-control form-control-sm','style'=>'position: relative; bottom: 0px;','placeholder'=>'مثال: https://t.me/fashion']) !!}
                                
                            </div>
                        </div>
                        <div class="col-auto">
                          <button type="submit" class="btn btn-sm btn-primary" style="position: relative; top:29px;">
                            ذخیره
                          </button>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                {!! Form::checkbox('status', null,$network->status == true ? true : false,['class'=>'form-check-input']) !!}
                                {!! Form::label('status','آیا فعال باشد؟',['class'=>'form-check-label']) !!}
                              </div>
                            <div>
                        </div>
                    {!! Form::close() !!}
                    @push('script')
                        <script>
                            $('#social_edit_form').validate({
                                rules:{
                                    name:{
                                        required: true
                                    },
                                    link:{
                                        required: true
                                    }
                                },
                                messages:{
                                    name:{
                                        required: 'فیلد عنوان اجباری می باشد.'
                                    },
                                    link:{
                                        required: 'فیلد پیوند اجباری می باشد.'
                                    }
                                },
                                submitHandler: function(form){
                                    form.submit();
                                }
                            })
                        </script>
                    @endpush
                </div>
            </div>
        </div>
    </div>
</div>
@endsection