
@if (session()->has('category_create_form'))
    @if (session()->get('category_create_form'))
        <script>
            new Toast({
                message:'دسته بندی با موفقیت اضافه شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'دسته بندی اضافه نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('category_edit_form'))
    @if (session()->get('category_edit_form'))
        <script>
            new Toast({
                message:'دسته بندی با موفقیت ویرایش شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'دسته بندی ویرایش نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('category_delete_form'))
    @if (session()->get('category_delete_form'))
        <script>
            new Toast({
                message:'دسته بندی با موفقیت حذف شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'دسته بندی حذف نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('media_create_form'))
    @if (session()->get('media_create_form'))
        <script>
            new Toast({
                message:'رسانه با موفقیت اضافه شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'رسانه اضافه نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('media_delete_form'))
    @if (session()->get('media_delete_form'))
        <script>
            new Toast({
                message:'رسانه با موفقیت حذف شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'رسانه حذف نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('post_create_form'))
    @if (session()->get('post_create_form'))
        <script>
            new Toast({
                message:'پست با موفقیت اضافه شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'پست اضافه نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('post_edit_form'))
    @if (session()->get('post_edit_form'))
        <script>
            new Toast({
                message:'پست با موفقیت ویرایش شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'پست ویرایش نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('post_delete_form'))
    @if (session()->get('post_delete_form'))
        <script>
            new Toast({
                message:'پست با موفقیت حذف شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'پست حذف نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('page_create_form'))
    @if (session()->get('page_create_form'))
        <script>
            new Toast({
                message:'صفحه با موفقیت اضافه شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'صفحه اضافه نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('page_edit_form'))
    @if (session()->get('page_edit_form'))
        <script>
            new Toast({
                message:'صفحه با موفقیت ویرایش شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'صفحه ویرایش نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('page_delete_form'))
    @if (session()->get('page_delete_form'))
        <script>
            new Toast({
                message:'صفحه با موفقیت حذف شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'صفحه حذف نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('comment_edit_form'))
    @if (session()->get('comment_edit_form'))
        <script>
            new Toast({
                message:'نظر با موفقیت ویرایش شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'نظر ویرایش نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('comment_delete_form'))
    @if (session()->get('comment_delete_form'))
        <script>
            new Toast({
                message:'نظر با موفقیت حذف شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'نظر حذف نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('profile_edit_form'))
    @if (session()->get('profile_edit_form'))
        <script>
            new Toast({
                message:'پروفایل با موفقیت ویرایش شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'پروفایل ویرایش نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('photo_delete_form'))
    @if (session()->get('photo_delete_form'))
        <script>
            new Toast({
                message:'تصویر با موفقیت حذف شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'تصویر حذف نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('section_edit_form'))
    @if (session()->get('section_edit_form'))
        <script>
            new Toast({
                message:'بخش با موفقیت ویرایش شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'بخش ویرایش نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('section_delete_form'))
    @if (session()->get('section_delete_form'))
        <script>
            new Toast({
                message:'تصویر با موفقیت حذف شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'تصویر حذف نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('social_create_form'))
    @if (session()->get('social_create_form'))
        <script>
            new Toast({
                message:'فضای مجازی با موفقیت اضافه شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'فضای مجازی اضافه نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('social_edit_form'))
    @if (session()->get('social_edit_form'))
        <script>
            new Toast({
                message:'فضای مجازی با موفقیت ویرایش شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'فضای مجازی ویرایش نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('social_delete_form'))
    @if (session()->get('social_delete_form'))
        <script>
            new Toast({
                message:'فضای مجازی با موفقیت حذف شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'فضای مجازی حذف نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('setting_edit_form'))
    @if (session()->get('setting_edit_form'))
        <script>
            new Toast({
                message:'تنظیمات با موفقیت ویرایش شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'تنظیمات ویرایش نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('setting_siteTitle_edit_form'))
    @if (session()->get('setting_siteTitle_edit_form'))
        <script>
            new Toast({
                message:'عنوان سایت با موفقیت ویرایش شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'عنوان سایت ویرایش نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('setting_siteIcon_edit_form'))
    @if (session()->get('setting_siteIcon_edit_form'))
        <script>
            new Toast({
                message:'آیکون سایت با موفقیت ویرایش شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'آیکون سایت ویرایش نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('setting_siteLogo_edit_form'))
    @if (session()->get('setting_siteLogo_edit_form'))
        <script>
            new Toast({
                message:'لوگو سایت با موفقیت ویرایش شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'لوگو سایت ویرایش نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('setting_logoTitle_edit_form'))
    @if (session()->get('setting_logoTitle_edit_form'))
        <script>
            new Toast({
                message:'عنوان لوگو با موفقیت ویرایش شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'عنوان لوگو ویرایش نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('user_create_form'))
    @if (session()->get('user_create_form'))
        <script>
            new Toast({
                message:'کاربر با موفقیت اضافه شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'کاربر اضافه نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('user_edit_form'))
    @if (session()->get('user_edit_form'))
        <script>
            new Toast({
                message:'کاربر با موفقیت ویرایش شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'کاربر ویرایش نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('user_delete_form'))
    @if (session()->get('user_delete_form'))
        <script>
            new Toast({
                message:'کاربر با موفقیت حذف شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'کاربر حذف نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('user_deletePhoto_form'))
    @if (session()->get('user_deletePhoto_form'))
        <script>
            new Toast({
                message:'تصویر کاربر با موفقیت حذف شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'تصویر کاربر حذف نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('login_error'))
    @if (session()->get('login_error'))
        <script>
            new Toast({
                message:'گذرواژه یا شماره همراه اشتباه می باشد',
                type:'danger'
            })
        </script>
    @endif
@endif

@if (session()->has('payment_gateways_create_form'))
    @if (session()->get('payment_gateways_create_form'))
        <script>
            new Toast({
                message:'درگاه پرداخت با موفقیت اضافه شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'درگاه پرداخت اضافه نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('payment_gateways_edit_form'))
    @if (session()->get('payment_gateways_edit_form'))
        <script>
            new Toast({
                message:'درگاه پرداخت با موفقیت ویرایش شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'درگاه پرداخت ویرایش نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('payment_gateways_delete_form'))
    @if (session()->get('payment_gateways_delete_form'))
        <script>
            new Toast({
                message:'درگاه پرداخت با موفقیت حذف شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'درگاه پرداخت حذف نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('payment_items_create_form'))
    @if (session()->get('payment_items_create_form'))
        <script>
            new Toast({
                message:'قیمت گذاری محصول با موفقیت انجام شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'قیمت گذاری محصول انجام نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('payment_items_edit_form'))
    @if (session()->get('payment_items_edit_form'))
        <script>
            new Toast({
                message:'قیمت محصول با موفقیت ویرایش شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'قیمت محصول ویرایش نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('payment_items_delete_form'))
    @if (session()->get('payment_items_delete_form'))
        <script>
            new Toast({
                message:'قیمت محصول با موفقیت حذف شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'قیمت محصول حذف نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('payment_logs_create_form'))
    @if (session()->get('payment_logs_create_form'))
        <script>
            new Toast({
                message:'گزارش پرداخت با موفقیت اضافه شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'گزارش پرداخت اضافه نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('payment_logs_edit_form'))
    @if (session()->get('payment_logs_edit_form'))
        <script>
            new Toast({
                message:'گزارش پرداخت با موفقیت ویرایش شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'گزارش پرداخت ویرایش نشد',
                type:'f'
            })
        </script>    
    @endif
@endif

@if (session()->has('payment_logs_delete_form'))
    @if (session()->get('payment_logs_delete_form'))
        <script>
            new Toast({
                message:'گزارش پرداخت با موفقیت حذف شد',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'گزارش پرداخت حذف نشد',
                type:'f'
            })
        </script>    
    @endif
@endif
@if (session()->has('password-forgotten'))
    @if (session()->get('password-forgotten'))
        <script>
            new Toast({
                message:'لینک بازیابی گذرواژه به ایمیل شما ارسال گردید',
                type:'s'
            })
        </script>
    @else
        <script>
            new Toast({
                message:'پست الکتریکی یا این آدرس در سیستم ثبت نگردیده است',
                type:'f'
            })
        </script>    
    @endif
@endif
@if (session()->has('change-password-forgotten'))
    @if (session()->get('change-password-forgotten'))
        <script>
            new Toast({
                message:'گذرواژه ویرایش گردید',
                type:'s'
            })
        </script>    
    @endif
@endif