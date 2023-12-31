@php
    $setting = \App\Models\Setting::get()->last();
@endphp
@push('meta')
    <title>
        مطالب آموزشی - {{$setting->siteTitle}}
    </title>
    <meta name="description" content="{{$setting->description}}">
    <meta name="keywords" content="{{$setting->keywords}}">
    <meta property="og:title" content="مطالب آموزشی - {{$setting->siteTitle}}">
    <meta property="og:description" content="{{$setting->description}}">
    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{$setting->siteTitle}}">
    <meta property="og:image" content="{{asset('storage/setting/'.$setting->siteIcon)}}">
    <meta name="twitter:title" content="مطالب آموزشی - {{$setting->siteTitle}}">
    <meta name="twitter:description" content="{{$setting->description}}">
    <meta name="twitter:image" content="{{asset('storage/setting/'.$setting->siteIcon)}}">
@endpush
@extends('index')

@section('content')
    <div class="section training-section">
        <h2 class="title">
            مطالب آموشی
            <hr>
        </h2>
        <div class="section-content">
            @if(count($posts) > 0)               
                @foreach ($posts as $item)            
                    <div class="train-item">
                        <div class="train-item-image">
                            <span class="train-item-image-duration">
                                @php
                                    $created_at_in_jalali = \Morilog\Jalali\CalendarUtils::convertNumbers(\Morilog\Jalali\Jalalian::fromCarbon($item->created_at)->format('Y-m-d'));
                                @endphp
                                {{$created_at_in_jalali}}
                            </span>
                            <span class="train-item-image-categorey">
                                {{$item->category->title}}
                            </span>
                            <img src="{{asset('storage/post/'.$item->path)}}" alt="">
                        </div>
                        <div class="train-item-body">
                            <h3>
                                {{$item->title}}
                            </h3>
                            <p>
                                {{$item->seo->description}}
                            </p>
                        </div>
                        <div class="train-item-footer">
                            <a href="{{route('post.index',$item->seo->slug)}}">
                                ادامه مطلب
                            </a>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="section-paragraph">
                    درحال حاضر مطلبی آموزشی برای نمایش وجود ندارد.
                </p>
            @endif
        </div>
    </div>
    {{$posts->links("pagination::default")}}
@endsection