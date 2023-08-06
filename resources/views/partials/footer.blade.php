@php
    $setting = \App\Models\Setting::get()->last();
    $social = \App\Models\SocialNetwork::where('status',true)->get();
@endphp
<footer>
    <section class="content">
        <div class="footer-logo">
            @if ($setting->siteLogo)
                <img src="{{asset('storage/setting/'.$setting->siteLogo)}}" alt="فوتر - لوگو">
            @else
                <img src="https://icon-library.com/images/hanger-icon/hanger-icon-17.jpg" alt="فوتر - لوگو">
            @endif

            @if ($setting->logoTitle)
                @php
                    $text = $setting->logoTitle;
                    $words = explode(" ", $text);
                    $firstWord = $words[0];
                    $restOfText = implode(" ", array_slice($words, 1));
                @endphp
                <span>
                    <b>{{$firstWord}}</b> {{$restOfText}}
                </span>
            @else
                <span>
                    <b>مونا</b> گلچین
                </span>
            @endif

        </div>
        <div class="footer-menu">
            <ul>
                <h3>دسترسی  سریع</h3>
                <li>
                    <a href="{{route('home')}}">
                        خانه
                    </a>
                </li>
                <li>
                    <a href="{{(str_ends_with(strtolower(URL::current()),'public')) ? '#fashion-world' : route('home') . '/#fashion-world'}}">
                        دنیای مد و استایل
                    </a>
                </li>
                <li>
                    <a href="{{(str_ends_with(strtolower(URL::current()),'public')) ? '#training' : route('home') . '/#training'}}">
                        آموزش
                    </a>
                </li>
                <li>
                    <a href="{{(str_ends_with(strtolower(URL::current()),'public')) ? '#biography' : route('home') . '/#biography'}}">
                        بیوگرافی
                    </a>
                </li>
                <li>
                    <a href="{{(str_ends_with(strtolower(URL::current()),'public')) ? '#social-networks' : route('home') . '/#social-networks'}}">
                        فضای مجازی
                    </a>
                </li>
            </ul>
            <ul>
                <h3>
                    فضای مجازی
                </h3>
                @if (count($social) > 0)
                    @foreach ($social as $item)
                        <li>
                            <a href="{{$item->link}}" target="_blank">
                                {{$item->name}}
                            </a>
                        </li>                        
                    @endforeach
                @else
                    <li>
                        <a href="">
                            تلگرام
                        </a>
                    </li>
                    <li>
                        <a href="#fashion-world">
                            توییتر
                        </a>
                    </li>
                    <li>
                        <a href="#training">
                            اینستاگرام
                        </a>
                    </li>
                    <li>
                        <a href="#biography">
                            فیسبوک
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </section>
    <hr />
    @if ($setting->footerText)
        <p> 
            {{$setting->footerText}}
        </p>
    @else
        <p>
            تمامی حقوق این وبسایت متعلق به مونا گلچین می باشد.
        </p>
    @endif
</footer>
