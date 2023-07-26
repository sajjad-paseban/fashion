<footer>
    <section class="content">
        <div class="footer-logo">
            <img src="https://icon-library.com/images/hanger-icon/hanger-icon-17.jpg" alt="فوتر - لوگو">
            <span>
                <b>مونا</b> گلچین
            </span>
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
            </ul>
        </div>
    </section>
    <hr />
    <p>
        تمامی حقوق این وبسایت متعلق به مونا گلچین می باشد.
    </p>
</footer>
