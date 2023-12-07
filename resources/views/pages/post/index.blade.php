@php
    $setting = \App\Models\Setting::first();
@endphp
@push('meta')
    <title>
        {{$data->title}} - {{$setting->siteTitle}}
    </title>
    <meta name="description" content="{{$data->description}}">
    <meta name="keywords" content="{{$data->keywords}}">
    <meta property="og:title" content="{{$data->title}} - {{$setting->siteTitle}}">
    <meta property="og:description" content="{{$data->description}}">
    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:site_name" content="{{$setting->siteTitle}}">
    <meta property="og:image" content="{{asset('storage/post/'.$data->post->path)}}">
    <meta name="twitter:title" content="{{$data->title}} - {{$setting->siteTitle}}">
    <meta name="twitter:description" content="{{$data->description}}">
    <meta name="twitter:image" content="{{asset('storage/post/'.$data->post->path)}}">
@endpush
@extends('index')
@section('content')
    <div class="section">
        <h2 class="title" style="margin-bottom: 0;">
            {{$data->post->title}}
            <br>
            <div class="post-info">
                <span>
                    نویسنده: {{$data->post->user ? $data->post->user->name : $setting->author}}
                </span>
                <span>
                    @php
                        $created_at_in_jalali = \Morilog\Jalali\CalendarUtils::convertNumbers(\Morilog\Jalali\Jalalian::fromCarbon($data->post->created_at)->format('d-m-Y'));
                    @endphp
                    تاریخ: {{$created_at_in_jalali}}
                </span>
                <span>
                    دسته بندی: {{$data->post->category ? $data->post->category->title : 'بدون دسته بندی'}}
                </span>
            </div>
            <hr>
        </h2>

        <div class="section-content seo-content">
            @if ($data->post->is_payable && !in_array(session()->get('user_id'),$users_payments))
                <div class="payment">
                    <div class="payment-header">
                        <p>
                            این آموزش می بایست در ابتدا خریداری شود.
                        </p>
                        <p class="price-tag">
                            {{$data->post->payment_item ? number_format($data->post->payment_item->amount) : "بدون قیمت"}}
                        </p>
                        <p style="color: #ff3c41">
                            @if (session()->get('payment_error'))
                                {{session()->get('payment_error')}}
                            @endif
                        </p>
                    </div>
                    @if ($payment_gateways)
                        {!! Form::open(['route'=> ['payment', session()->get('user_id'), $data->post->id] , 'method' => 'POST' , 'id'=>'payment']) !!}
                        <div class="payment-body">
                            @foreach ($payment_gateways as $item)
                                <div class="payment-item">
                                    <label>
                                        <input type="radio" value="{{$item->id}}" name="gateway" class="card-input-element" />
                                        <div class="panel panel-default card-input">
                                            <div class="panel-body">
                                                <img src="{{asset('storage/payment_gateways/'.$item->img_path)}}" alt="">
                                            </div>
                                            <div class="panel-heading">
                                                {{$item->title}}
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div style="text-align: center;">
                            <button class="custom-btn" style="left: 0" type="submit">
                                پرداخت اینترنتی
                            </button>
                        </div>
                        {!! Form::close() !!}
                        @push('script')
                            <script>                
                                $('#payment').validate({
                                    rules:{
                                        gateway:{
                                            required: true
                                        }
                                    },
                                    messages:{
                                        gateway:{
                                            required: 'یکی از درگاه های پرداخت زیر را انتخاب نمایید'
                                        }
                                    },
                                    submitHandler: function(form){
                                        form.submit();
                                    }
                                });
                            </script>
                        @endpush
                    @endif
                </div>                
            @else
                {!! $data->post->content !!}
            @endif
        </div>
    </div>

    <div class="section training-section">
        <h2 class="title">
            ثبت نظر
            <hr>
        </h2>
        <p class="section-paragraph">
            در این بخش می توانید نظر خود را در مورد این مطلب آموزشی ثبت نمایید.
        </p>
        <div class="section-content">
            {!! Form::open(['id'=>'comment']) !!}
                <div class="frm-control">
                    {!! Form::label('comment',':نظر') !!}
                    {!! Form::textarea('comment') !!}
                </div>
                <button class="custom-btn" type="submit">
                    ثبت
                </button>
            {!! Form::close() !!}
        
        </div>
    </div>
    @push('script')
        <script>
            $('#comment').validate({
                rules:{
                    comment:{
                        required: true,
                    }
                },
                messages:{
                    comment:{
                        required: '.فیلد نظر اجباری می باشد',
                    }
                },
                submitHandler: function(form){
                    $.ajax({
                        url: '/fashion/public/api/comment/store',
                        data: {
                            post_id: {{$data->post->id}},
                            comment: form.comment.value
                        },
                        method: 'POST',
                        success: function(res){
                            if(res.status == 1){
                                new Toast({
                                    message:'نظر شما با موفقیت ثبت شد',
                                    type:'s'
                                })
                                console.log(1);
                            }else{
                                console.log(2);
                            }

                            form.reset();
                        }
                    })
                }
            });
        </script>
    @endpush
    <div class="section training-section" style="margin-bottom: 350px;">
        <h2 class="title">
            نظرات سایر کاربران
            <hr>
        </h2>
        <div class="section-content" style="flex-wrap: wrap;">
            @if (count($data->post->comments) > 0)
                @foreach ($data->post->comments as $item)
                    <div class="comment-item">
                        <div class="item-top">
                            <img src="{{$item->user->photo_path ? asset('storage/user/'.$item->user->photo_path) : asset('icons/default-user.svg.png')}}" alt="">
                            <div class="item-info">
                                <div class="user-name">
                                    {{$item->user->name}}
                                </div>
                                <div class="comment-date">
                                    @php
                                        $created_at_in_jalali = \Morilog\Jalali\CalendarUtils::convertNumbers(\Morilog\Jalali\Jalalian::fromCarbon($item->created_at)->format('d-m-Y'));
                                    @endphp
                                    {{$created_at_in_jalali}}
                                </div>
                            </div>    
                        </div>
                        <div class="item-message">
                            <span class="material-symbols-outlined">
                                subdirectory_arrow_left
                            </span>
                            <div class="content">
                                {{$item->comment}}
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="section-paragraph">
                    درحال حاضر نظری برای این مطلب آموزشی ثبت نشده است.
                </p>
            @endif            
        </div>
        {{-- <div style="display: flex;justify-content: center;">
            <button class="custom-btn">
                نمایش بیشتر
            </button>
        </div> --}}
    </div>
    <style>
        
        div.seo-content video{
            width: calc(100%) !important;
            height: auto !important;
        }
        div.seo-content img{
            width: calc(100%) !important;
            height: auto !important;
        }
        div.seo-content{
            direction: rtl;
            overflow-x: hidden;
            padding: 0 50px;
            font-family: 'yekan';
        }
        footer{
            margin-top: 500px !important;
        }
        form{
            width: 100%;
        }
    </style>
@endsection
@push('script')
    <script>
        try{
            $(document).ready(function(){
                $('.seo-content img').each(function() 
                {
                    var src = $(this).attr('src');
                    var first = 0
                    var end = src.indexOf('/storage')
                    var removeItemText = src.substr(first,end)
                    var newSrc = src.replace(removeItemText,location.origin+'/fashion/public')
                    $(this).attr('src',newSrc);
                })
    
                $('.section video source').each(function() {
                    var src = $(this).attr('src');
                    var first = 0
                    var end = src.indexOf('/storage')
                    var removeItemText = src.substr(first,end)
                    var newSrc = src.replace(removeItemText,location.origin+'/fashion/public')
                    $(this).attr('src',newSrc);
                })
                
                var count = 0;
                $('.section video').each(function() {
                    // playsinline controls ="/path/to/poster.jpg"
                    count++;
                    $(this).attr('id','player'+count);
                    $(this).attr('playsinline','');
                    $(this).attr('controls','');
                    $(this).attr('data-poster','{{asset('storage/post/'.$data->post->path)}}');
                    new Plyr('#player'+count);
                })
            })
        }catch(ex){}
    </script>
@endpush
