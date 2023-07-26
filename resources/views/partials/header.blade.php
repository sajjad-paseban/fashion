<header>
    <div class="header-cover-shadow"></div>
    <div class="header-main">
        <section class="header-top fixed">
            <div class="header-top-search">
                {{-- <a href="{{route('login')}}">
                    <img src="https://cdn-icons-png.flaticon.com/512/5509/5509636.png" alt="ورود">
                </a> --}}
                <div class="image-profile">
                    <img class="default-image-profile" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/2048px-Default_pfp.svg.png" alt="پروفایل">
                    <span>
                        09152146319
                    </span>
                    <div class="image-profile-menu">
                        <div class="image-profile-menu-wrapper">
                            <ul>
                                <li>
                                    <a href="">
                                        مدیریت پروفایل
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        تغییر گذرواژه
                                    </a>
                                </li>
                                <li>
                                    <a href="">خروج از سایت</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
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
                        <img src="https://www.iconpacks.net/icons/2/free-arrow-down-icon-3101-thumb.png" alt="">
                        <div class="train-menu">
                            <div class="train-menu-wrapper">
                                <ul>
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
                                </ul>
                                <ul>
                                    <h2>برای تست</h2>
                                    <li>
                                        <a href="">مقدم</a>
                                    </li>
                                    <li>
                                        <a href="">بخش 2</a>
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
                                </ul>
                                <ul>
                                    <h2>برای تست</h2>
                                    <li>
                                        <a href="">مقدم</a>
                                    </li>
                                    <li>
                                        <a href="">بخش 2</a>
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
                                </ul>
                                <ul>
                                    <h2>برای تست</h2>
                                    <li>
                                        <a href="">1</a>
                                    </li>
                                    <li>
                                        <a href="">2</a>
                                    </li>
                                </ul>
                                <ul>
                                    <h2>برای تست</h2>
                                    <li>
                                        <a href="">1</a>
                                    </li>
                                    <li>
                                        <a href="">2</a>
                                    </li>
                                </ul>
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
                <span onclick="location.replace('{{route('home')}}')">
                    <b>مونا</b> گلچین
                </span>
                <img onclick="location.replace('{{route('home')}}')" src="https://icon-library.com/images/hanger-icon/hanger-icon-17.jpg" alt="لوگو">
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
                            <img src="https://www.iconpacks.net/icons/2/free-arrow-down-icon-3101-thumb.png" alt="">
                            <div class="train-menu">
                                <div class="train-menu-wrapper">
                                    <ul>
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
                                    </ul>
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
        @if (str_ends_with(strtolower(URL::current()),'public'))
            <section class="header-content">
                <div class="header-content-side">
                    <p class="headline-first">طراحی مد <span>با</span> <b>مونا</b></p>
                    <p class="headline-second">FASHION <span>NEVER</span> <b>SLEEPS</b></p>
                </div>
                <img class="photograph" src="{{asset('images/michael-guichard-SALWA-RAJAA-0116-5-removebg-preview.png')}}" alt="مونا گلچین">
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
