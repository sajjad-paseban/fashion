@php
    $user = App\Models\User::find(session()->get('user_id'));
@endphp
<header>
    <ul>
        <li class="profile">
            <span>{{$user->name}}</span>
            <img src="{{$user->photo_path ? asset('storage/user/'.$user->photo_path) : asset('icons/default-user.svg.png')}}" alt="">
            <div class="profile-menu">
                <div class="profile-wrapper">
                    <div class="profile-wrapper-header">
                        <img src="{{$user->photo_path ? asset('storage/user/'.$user->photo_path) : asset('icons/default-user.svg.png')}}" alt="">
                        <span>{{$user->name}}</span>
                        <b>مدیر کل سایت</b>
                    </div>
                    <div class="profile-wrapper-body">
                        <ul>
                            <li>
                                <a href="{{route('home')}}">
                                    رفتن به سایت
                                </a>
                            </li>
                            <li>
                                <a href="{{route('admin.setting.index')}}">
                                    تنظیمات
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="profile-wrapper-footer">
                        <ul>
                            <li>
                                <a href="{{route('logout')}}">
                                    خروج
                                </a>
                            </li>
                            <li>
                                <a href="{{route('profile.index')}}">
                                    پروفایل
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </li>
        <li class="notification">
            <span class="material-symbols-outlined">
                <span class="badge bg-danger">2</span>
                notifications
            </span>
            <div class="header-box notification-box">
                <div class="top">
                    <button>
                        پاک کردن همه
                    </button>
                    <span>
                        ۱۰ اعلان جدید
                    </span>
                </div>
                <div class="body">
                    <div class="box-item">
                        <span>
                            2
                        </span>
                        <span>
                            1
                        </span>
                    </div>
                </div>
                <div class="footer">
                    <a href="">
                        نمایش همه
                    </a>
                </div>
            </div>
        </li>
        <li class="message">
            <span class="material-symbols-outlined">
                <span class="badge bg-warning text-dark">2</span>
                mail
            </span>
            <div class="header-box message-box">
                <div class="top">
                    <button>
                        پاک کردن همه
                    </button>
                    <span>
                        ۱۰ اعلان جدید
                    </span>
                </div>
                <div class="body">
                    <div class="box-item">
                        <span>
                            2
                        </span>
                        <span>
                            1
                        </span>
                    </div>
                </div>
                <div class="footer">
                    <a href="">
                        نمایش همه
                    </a>
                </div>
            </div>
        </li>
    </ul>
    <img src="{{asset('images/menu_icon.png')}}" class="menu-icon" alt="">
</header>