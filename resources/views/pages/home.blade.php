@extends('index')
@push('meta')
    <title>
        صفحه اصلی - {{$setting->siteTitle}}
    </title>
    <meta name="description" content="{{$setting->description}}">
    <meta name="keywords" content="{{$setting->keywords}}">
    <meta property="og:title" content="صفحه اصلی - {{$setting->siteTitle}}">
    <meta property="og:description" content="{{$setting->description}}">
    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{$setting->siteTitle}}">
    {{-- <meta property="og:image" content="https://example.com/image.jpg"> --}}
    <meta name="twitter:title" content="صفحه اصلی - {{$setting->siteTitle}}">
    <meta name="twitter:description" content="{{$setting->description}}">
    {{-- <meta name="twitter:image" content="https://example.com/image.jpg"> --}}
@endpush
@section('content')

    <div class="section fashion-world-section">
        <h2 class="title" id="fashion-world">
            دنیای مد و استایل
            <hr>
        </h2>
        <div class="section-content">
            <div class="section-content-bg" style="{{$section->worldPhoto ? 'background-image: url($section->worldPhoto);' : 'background-image: url(https://imageio.forbes.com/specials-images/imageserve/626535993/0x0.jpg?format=jpg&width=1200);'}}">
                <div class="section-content-bg-cover"></div>
            </div>
            @if ($section->worldContent)
                <p>
                    {{$section->worldContent}}
                </p>                
            @else
                <p>
                    دنیای مد و استایل در هر رابطه ای باحاله
                </p>
            @endif
        </div>
    </div>
    @if (count($posts))        
        <div class="section training-section">
            <h2 class="title" id="training">
                آموزش
                <hr>
            </h2>
            @if ($section->trainingContent)
                <p class="section-paragraph">
                    {{$section->trainingContent}}
                </p>        
            @endif
            <div class="section-content">
                @foreach ($posts as $item)                    
                    <div class="train-item">
                        <div class="train-item-image">
                            <span class="train-item-image-duration">
                                20
                            </span>
                            <span class="train-item-image-categorey">
                                مقدمه
                            </span>
                            <img src="https://learn.g2.com/hubfs/training-videos.png" alt="">
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
                            <a href="{{route('page')}}">
                                ادامه مطلب
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    <div class="section biography-section">
        <h2 class="title" id="biography">
            بیوگرافی
            <hr>
        </h2>
        <div class="section-content">
            @if ($section->biographyPhotoPath)
                <img src="{{asset('storage/section/'.$section->biographyPhotoPath)}}" alt="بیوگرافی - مونا گلچین">            
            @else
                <img src="{{asset('images/michael-guichard-SALWA-RAJAA-0478-2-removebg-preview.png')}}" alt="بیوگرافی - مونا گلچین">            
            @endif

            @if ($section->biographyContent)
                <p>
                    {{$section->biographyContent}}
                </p>
            @else
                <p>
                    برای ایجاد این وبسایت زحمات بسیاری کشیدم
                </p>
            @endif
        </div>
    </div>
    @if (count($networks))    
        <div class="section social-network-section">
            <h2 class="title" id="social-networks">
                فضای مجازی
                <hr>
            </h2>
            @if ($section->socialNetworkContent)
                <p class="section-paragraph">
                    {{$section->socialNetworkContent}}
                </p>        
            @else
                <p class="section-paragraph">شما همچنین  می توانید,  من را در سایر شبکه های اجتماعی همراهی کنید</p>        
            @endif
            <div class="section-content">
                @foreach ($networks as $item)
                    <div class="item">
                        <a href="{{$item->link}}" target="_blank">
                            <img src="{{asset('storage/social/'.$item->icon_path)}}" alt="{{$item->name}}">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endsection
