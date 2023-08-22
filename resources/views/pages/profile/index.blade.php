@extends('index')
@section('content')
    @php
        $user = App\Models\User::find(session()->get('user_id'));
        $date = \Morilog\Jalali\CalendarUtils::strftime('Y-m-d', strtotime($user->birthdate));
        $persianDate = \Morilog\Jalali\CalendarUtils::convertNumbers($date);
    @endphp
    <div class="section">
        <h2 class="title">
            مدیریت پروفایل - مشخصات کاربر
            <hr>
        </h2>
        <p class="section-paragraph">
            کاربر در این بخش می بایست مشخصات خود را تکمیل نماید.
        </p>
        <div class="section-content">
            {!! Form::model($user,['route'=>['profile.profile-action',$user->id],'method'=>'PUT','files'=>true,'id'=>'profile']) !!}
                <div class="frm-control profile">
                    @if ($user->photo_path)
                        <img src="{{asset('storage/user/'.$user->photo_path)}}" class="image-profile" id="photo_img_tag" alt="">                    
                    @else
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/2048px-Default_pfp.svg.png" id="photo_img_tag" class="image-profile" alt="">
                    @endif
                    {!! Form::label('photo_path','آپلود تصویر') !!}
                    @if ($user->photo_path)
                        <button type="button" onclick="location.replace('{{route('profile.delete-photo',$user->id)}}')">حذف تصویر</button>
                    @endif
                    {!! Form::file('photo_path',['style'=>'display:none;','id'=>'photo_path']) !!}
                </div>
                <div class="frm-control">
                    {!! Form::label('name','نام و نام خانوادگی') !!}
                    {!! Form::text('name') !!}
                </div>
                <div class="frm-control">
                    {!! Form::label('phonenumber','شماره همراه') !!}
                    {!! Form::text('phonenumber') !!}
                </div>
                <div class="frm-control">
                    {!! Form::label('email','پست الکترونیکی') !!}
                    {!! Form::email('email') !!}
                </div>
                <div class="frm-control">
                    {!! Form::label('birthdate','تاریخ تولد') !!}
                    <input type="text" value="{{$persianDate}}" name="birthdate" id="birthdate" data-jdp>
                    @push('script')
                        <script>
                            document.getElementById('birthdate').value = "{{str_replace('-','/',$date)}}"
                            jalaliDatepicker.startWatch();
                        </script>
                    @endpush
                </div>
                <button class="custom-btn" type="submit">
                    ثبت
                </button>
            {!! Form::close() !!}
        </div>
    </div>
    <style>
        div.section-content{
            display: flex;
            justify-content: center;
            width: 100%;
        }
        footer{
            margin-top: 500px !important;
        }
        .frm-control{
            width: 400px;
        }
    </style>
    @push('script')
        <script>
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

            $('#profile').validate({
                rules:{
                    name:{
                        required: true,
                    },
                    phonenumber:{
                        required: true,
                        minlength: 11,
                        maxlength: 11
                    },
                    email: {
                        required: true,
                        email: true
                    }
                },
                messages:{
                    name:{
                        required: '.فیلد نام و نام خانوادگی اجباری می باشد',
                    },
                    phonenumber:{
                        required: '.فیلد شماره همراه اجباری می باشد',
                        minlength: '.طول فیلد شماره همراه 11 رقم می باشد',
                        maxlength: '.طول فیلد شماره همراه 11 رقم می باشد'
                    },
                    email:{
                        required: '.فیلد پست الکترنیکی اجباری می باشد',
                        email: 'پست الکتریکی صحیح نمی باشد'
                    }
                },
                submitHandler: function(form){
                    form.submit();
                }
            });
        </script>
    @endpush
@endsection
