@php
    $user = App\Models\User::find(session()->get('user_id'));
@endphp
<div class="menu-top">
    <h4>
        کنترل پنل مدیریت
    </h4>
</div>
<div class="menu-body">
    <div class="menu-header">
        <div class="menu-header-user">
            <div class="info">
                <b>{{$user->name}}</b>
                <span>
                    آنلاین
                    <span class="green-icon"></span>
                </span>
            </div>
            <img src="{{$user->photo_path ? asset('storage/user/'.$user->photo_path) : asset('icons/default-user.svg.png')}}" alt="">
        </div>
        <div class="menu-header-search">
            <form action="">
                <button>
                    <span class="material-symbols-outlined">search</span>
                </button>
                <input class="search-input" type="search" placeholder="جست و جو">
            </form>
        </div>
    </div>
    <div class="menu-content">
        <ul>
            <h6>عنوان</h6>
            <li class="{{(str_ends_with(strtolower(URL::current()),'administrator')) ? 'active' : ''}}" onclick="location.replace('{{route('admin.dashboard')}}')" class="active">
                <a>
                    داشبورد
                    <span class="material-symbols-outlined">
                        dashboard
                    </span>
                </a>
            </li>
            <li class="{{(str_contains(strtolower(URL::current()),'post')) ? 'active' : ''}}" onclick="location.replace('{{route('admin.post.index')}}')">
                <a>
                    مدیریت پست ها
                    <span class="material-symbols-outlined">
                        subscriptions
                    </span>
                </a>
            </li>
            <li class="{{(str_contains(strtolower(URL::current()),'page')) ? 'active' : ''}}" onclick="location.replace('{{route('admin.page.index')}}')"> 
                <a>
                    مدیریت صفحات
                    <span class="material-symbols-outlined">
                        article
                    </span>
                </a>
            </li>
            <li class="{{(str_contains(strtolower(URL::current()),'media')) ? 'active' : ''}}" onclick="location.replace('{{route('admin.media.index')}}')">
                <a>
                    مدیریت رسانه
                    <span class="material-symbols-outlined">
                        perm_media
                    </span>
                </a>
            </li>
            <li class="{{(str_contains(strtolower(URL::current()),'comment')) ? 'active' : ''}}" onclick="location.replace('{{route('admin.comment.index')}}')">
                <a>
                    مدیریت نظرات
                    <span class="material-symbols-outlined">
                        chat
                    </span>
                </a>
            </li>
            <li class="{{(str_contains(strtolower(URL::current()),'section')) ? 'active' : ''}}" onclick="location.replace('{{route('admin.section.index')}}')">
                <a>
                    مدیریت بخش ها
                    <span class="material-symbols-outlined">
                        filter_none
                    </span>
                </a>
            </li>
            <li class="{{(str_contains(strtolower(URL::current()),'user')) ? 'active' : ''}}" onclick="location.replace('{{route('admin.user.index')}}')">
                <a>
                    مدیریت کاربران
                    <span class="material-symbols-outlined">
                        person_pin
                    </span>
                </a>
            </li>
            <li class="{{(str_contains(strtolower(URL::current()),'category')) ? 'active' : ''}}" onclick="location.replace('{{route('admin.category.index')}}')">
                <a>
                    مدیریت دسته بندی
                    <span class="material-symbols-outlined">
                        category
                    </span>
                </a>
            </li>
            <li class="sub {{(str_contains(strtolower(URL::current()),'social') || str_contains(strtolower(URL::current()),'setting')) ? 'active show-sub-menu' : ''}}">
                <a>
                    تنظیمات
                    <span class="material-symbols-outlined">
                        settings
                    </span>
                </a>
                <span class="material-symbols-outlined">
                    chevron_right
                </span>
                <div class="sub-menu">
                    <ul>
                        <li class="{{(str_contains(strtolower(URL::current()),'payment_gateways')) ? 'active' : ''}}" onclick="location.replace('{{route('admin.payment_gateways.index')}}')">
                            <a>
                                مدیریت درگاه های پرداخت
                                <span class="material-symbols-outlined">
                                    circle
                                </span>
                            </a>
                        </li>
                        <li class="{{(str_contains(strtolower(URL::current()),'social')) ? 'active' : ''}}" onclick="location.replace('{{route('admin.social.index')}}')">
                            <a>
                                فضای مجازی
                                <span class="material-symbols-outlined">
                                    circle
                                </span>
                            </a>
                        </li>
                        <li class="{{(str_contains(strtolower(URL::current()),'setting')) ? 'active' : ''}}" onclick="location.replace('{{route('admin.setting.index')}}')">
                            <a>
                                پایه
                                <span class="material-symbols-outlined">
                                    circle
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>