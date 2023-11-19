@php
    $buttons = [['name'=>'نمایش تمام رسانه ها','href'=>route('admin.media.index')]]
@endphp
@extends('admin.index')

@section('content')
    @push('style')

    @endpush
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h4 class="title p-4">
                    مدیریت رسانه - جدید
                </h4>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <x-box title="رسانه جدید" :buttons="$buttons">
                    {!! Form::open(['route'=>'admin.media.store','files'=>true,'method'=>'POST','id'=>'media_create_form']) !!}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {!! Form::label('path','آپلود فایل') !!}
                                    {!! Form::file('path',['class'=>'form-control form-control-sm','autocomplete'=>'off']) !!}
                                </div>
                            </div>
                            <div class="col-12 my-3">
                                <div class="progress d-none" style="height: 30px;">
                                    <div class="progress-bar" role="progressbar" style="width: 0%;font-family: 'yekan';font-size: 15px;">
                                    
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    ذخیره
                                </button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </x-box>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            $('#media_create_form').validate({
                rules:{
                    path:{
                        required: true
                    }
                },
                messages:{
                    path:{
                        required: 'فیلد آپلود فایل اجباری می باشد.'
                    }
                },
                submitHandler: function(form){
                    document.getElementsByClassName('progress')[0].classList.toggle('d-none');
                    var form = document.getElementById('media_create_form');
                    var formData = new FormData(form);

                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', '{{route('admin.media.store')}}', true);
                    
                    xhr.upload.addEventListener('progress', function(event) {
                        if (event.lengthComputable) {
                            var percent = (event.loaded / event.total) * 100;
                            var progressBar = document.getElementsByClassName('progress')[0].firstElementChild;
                            progressBar.style.width = percent + '%';
                            progressBar.innerHTML = percent.toFixed(2) + '%';
                        }
                    });
                    
                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            setTimeout(() => {
                                location.replace('{{route('admin.media.index')}}');
                            }, 1000);
                        } else {
                            console.log(xhr);
                        }
                    };
                    
                    xhr.send(formData);
                }
            });
        </script>
    @endpush
@endsection