@php
    $user = \App\Models\User::find(session()->get('user_id'));
    $setting = \App\Models\Setting::get()->last();
    $section = \App\Models\Section::get()->last();
    $category = \App\Models\Category::all();

@endphp
<header style="background-image: url('{{asset('images/header-background.avif')}}')">
    <div class="header-cover-shadow"></div>
    <div class="header-main">
        <section class="header-top {{str_ends_with(strtolower(URL::current()),'public') ? '' : 'sticky'}}">
            <div class="header-top-search">
                @if (session()->has('user_id'))                    
                    <div class="image-profile">
                        <img class="default-image-profile" src="{{$user->photo_path ? asset('storage/user/'.$user->photo_path) : asset('icon/default-user.svg.png')}}" alt="پروفایل">
                        <span>
                            @if ($user->name)
                                {{$user->name}}
                            @else
                                {{$user->phonenumber}}
                            @endif
                        </span>
                        <div class="image-profile-menu">
                            <div class="image-profile-menu-wrapper">
                                <ul>
                                    @if ($user->is_admin)
                                        <li>
                                            <a href="{{route('admin.dashboard')}}">
                                                مدیریت سایت
                                            </a>
                                        </li>                                        
                                    @endif
                                    <li>
                                        <a href="{{route('profile.index')}}">
                                            مدیریت پروفایل
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('profile.change-password')}}">
                                            تغییر گذرواژه
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('logout')}}">خروج از سایت</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @else
                
                <a href="{{route('login')}}">
                    <img src="https://cdn-icons-png.flaticon.com/512/5509/5509636.png" alt="ورود">
                </a>
                @endif
            </div>
            <div class="header-top-menu">
                <ul>
                    <li>
                        <a href="{{route('home')}}" class="active">خانه</a>
                    </li>
                    <li>
                        <a href="{{(str_ends_with(strtolower(URL::current()),'public')) ? '#fashion-world' : route('home') . '/#fashion-world'}}">
                            دنیای مد و استایل
                        </a>
                    </li>
                    <li id="train-list-item">
                        <a href="{{(str_ends_with(strtolower(URL::current()),'public')) ? '#training' : route('home') . '/#training'}}">آموزش</a>
                        <img src="{{asset('icon/arrow-down.png')}}" alt="">
                        <div class="train-menu">
                            <div class="train-menu-wrapper">
                                @foreach ($category as $item)
                                    @if ($item->parent_id == 0)
                                        <ul>
                                            <h2>{{$item->title}}</h2>
                                            @foreach ($item->posts as $post)
                                            <li>
                                                    <a href="{{route('post.index',$post->seo->slug)}}">{{$post->title}}</a>
                                                </li>
                                                @endforeach()
                                            @foreach ($item->children as $child)
                                            <h3>- {{$child->title}}</h3>
                                                @foreach ($child->posts as $post)
                                                    <li>
                                                        <a href="{{route('post.index',$post->seo->slug)}}">{{$post->title}}</a>
                                                    </li>
                                                    @endforeach()
                                                    
                                                    @foreach ($child->children as $child2)
                                                    <h4>- {{$child2->title}}</h4>
                                                    @foreach ($child2->posts as $post)
                                                        <li>
                                                            <a href="{{route('post.index',$post->seo->slug)}}">{{$post->title}}</a>
                                                        </li>
                                                    @endforeach()
                                                @endforeach
                                            @endforeach
                                        </ul>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="{{(str_ends_with(strtolower(URL::current()),'public')) ? '#biography' : route('home') . '/#biography'}}">بیوگرافی</a>
                    </li>
                    <li>
                        <a href="{{(str_ends_with(strtolower(URL::current()),'public')) ? '#social-networks' : route('home') . '/#social-networks'}}">فضای مجازی</a>
                    </li>
                </ul>
            </div>
            <div class="header-top-logo">
                @if ($setting->logoTitle)
                    @php
                        $text = $setting->logoTitle;
                        $words = explode(" ", $text);
                        $firstWord = $words[0];
                        $restOfText = implode(" ", array_slice($words, 1));
                    @endphp
                    <span onclick="location.replace('{{route('home')}}')">
                        <b>{{$firstWord}}</b> {{$restOfText}}
                    </span>
                    @else
                    <span onclick="location.replace('{{route('home')}}')">
                        <b>مونا</b> گلچین
                    </span>
                    @endif
                    
                    @if ($setting->siteLogo)
                    <img onclick="location.replace('{{route('home')}}')" src="{{asset('storage/setting/'.$setting->siteLogo)}}" alt="لوگو">                
                    @else
                    <img onclick="location.replace('{{route('home')}}')" src="{{asset('images/hanger-icon-17.jpg')}}" alt="لوگو">                
                    @endif
                </div>
            <div class="header-top-menu-mobile">
                <img src="{{asset('images/menu_icon.png')}}" class="menu_icon" alt="آیکون منو">
                <div class="header-top-menu-mobile-wrapper">
                    <ul>
                        <li>
                            <a href="{{route('home')}}" class="active">خانه</a>
                        </li>
                        <li>
                            <a href="{{(str_ends_with(strtolower(URL::current()),'public')) ? '#fashion-world' : route('home') . '/#fashion-world'}}">
                                دنیای مد و استایل
                            </a>
                        </li>
                        <li id="train-list-item">
                            <a href="{{(str_ends_with(strtolower(URL::current()),'public')) ? '#training' : route('home') . '/#training'}}">آموزش</a>
                            <img src="{{asset('icon/arrow-down.png')}}" alt="">
                            <div class="train-menu">
                                <div class="train-menu-wrapper">
                                    @foreach ($category as $item)
                                        @if ($item->parent_id == 0)
                                            <ul>
                                                <h2>{{$item->title}}</h2>
                                                @foreach ($item->posts as $post)
                                                   <li>
                                                        <a href="{{route('post.index',$post->seo->slug)}}">{{$post->title}}</a>
                                                    </li>
                                                @endforeach()
                                                @foreach ($item->children as $child)
                                                    <h3>- {{$child->title}}</h3>
                                                    @foreach ($child->posts as $post)
                                                        <li>
                                                            <a href="{{route('post.index',$post->seo->slug)}}">{{$post->title}}</a>
                                                        </li>
                                                        @endforeach()
                                                        
                                                        @foreach ($child->children as $child2)
                                                        <h4>- {{$child2->title}}</h4>
                                                        @foreach ($child2->posts as $post)
                                                            <li>
                                                                <a href="{{route('post.index',$post->seo->slug)}}">{{$post->title}}</a>
                                                            </li>
                                                        @endforeach()
                                                    @endforeach
                                                @endforeach
                                            </ul>
                                        @endif
                                    @endforeach
                                    {{-- <ul>
                                        <h2>طراحی مد</h2>
                                        <li>
                                            <a href="">مقدمه</a>
                                        </li>
                                        <li>
                                            <a href="">بخش 1</a>
                                        </li>
                                    </ul>
                                    <ul>
                                        <h2>برای تست</h2>
                                        <li>
                                            <a href="">مقدم</a>
                                        </li>
                                        <li>
                                            <a href="">بخش 2</a>
                                        </li>
                                    </ul> --}}
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="{{(str_ends_with(strtolower(URL::current()),'public')) ? '#biography' : route('home') . '/#biography'}}">بیوگرافی</a>
                        </li>
                        <li>
                            <a href="{{(str_ends_with(strtolower(URL::current()),'public')) ? '#social-networks' : route('home') . '/#social-networks'}}">فضای مجازی</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        @if (str_ends_with(strtolower(URL::current()),request()->getHost()))
            <section class="header-content">
                <div class="header-content-side">
                    @if ($setting->logoTitle)
                    @php
                            $text = $section->headerFarsiTitle;
                            $words = explode(" ", $text);
                            $lastWord = $words[count($words)-1];
                            $restOfText = implode(" ", array_slice($words, 0,count($words)-1));
                            @endphp
                        <p class="headline-first">{{$restOfText}} <b>{{$lastWord}}</b></p>
                        @else
                        <p class="headline-first">طراحی مد <span>با</span> <b>مونا</b></p>
                        @endif
                        @if ($section->headerSlogan)
                        @php
                            $slogan = json_decode($section->headerSlogan);
                            @endphp
                        <p class="headline-second">{{$slogan->first}} <span>{{$slogan->second}}</span> <b>{{$slogan->third}}</b></p>                        
                    @else
                    <p class="headline-second">FASHION <span>NEVER</span> <b>SLEEPS</b></p>
                    @endif
                </div>
                @if ($section->headerPhotoPath)
                    <img class="photograph" src="{{asset('storage/section/'.$section->headerPhotoPath)}}" alt="مونا گلچین">
                @else
                <img class="photograph" src="{{asset('images/michael-guichard-SALWA-RAJAA-0116-5-removebg-preview.png')}}" alt="مونا گلچین">
                @endif
            </section>
        @else
            <style>
                header{
                    height: 73px;
                }
            </style>
        @endif
    </div>
</header>