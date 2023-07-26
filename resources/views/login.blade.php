<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ورود - طراحی مد با مونا</title>
    <link rel="stylesheet" href="{{asset('dist/css/fonts.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/app.css')}}">
</head>
<body class="login">
    <div class="login-background-cover"></div>
    <div class="login-section">
        <div class="login-section-first form">
            <h2>
                ورود به سایت
            </h2>
            <div class="frm-control">
                <label for="phone">شماره همراه</label>
                <input id="phone" name="phone" placeholder="مثال: 09901234574" oninput="this.value = this.value.replace(/[^0-9]/g,'')" maxlength="13" type="text">
            </div>
            <button type="button" id="phone-continue">
                ادامه
            </button>
        </div>
        <div class="login-section-second invisible form">
            <h2>
                ورود به سایت
            </h2>
            <div class="frm-control">
                <label for="password">گذرواژه</label>
                <input id="password" name="password" type="password">
            </div>
            <div class="frm-control">
                <a href="">
                    گذرواژه خود را فراموش کرده ام!
                </a>
            </div>
            <button type="button" id="password-continue">
                ادامه
            </button>
        </div>
    </div>
    <div class="login-home-icon" onclick="location.replace('{{route('home')}}')">
        <img src="https://cdn-icons-png.flaticon.com/512/25/25694.png" alt="خانه">
    </div>
    <script>
        // login background changer
            const login_background_data = [
                {url: 'https://wallpapercave.com/wp/wp5877378.jpg' , position: 'top center'},
                {url: 'https://images.hdqwalls.com/wallpapers/margot-robbie-in-red-dress-img.jpg' , position: 'top center'},
                {url: 'https://wallpapercave.com/wp/wp10161927.jpg' , position: 'top center'},
                {url: 'https://wallpapercave.com/wp/wp9770047.jpg' , position: 'top left'},
                {url: 'https://img1.wallspic.com/crops/9/2/6/3/23629/23629-monochrome_mode-model-woman-singer-girl-2560x1600.jpg' , position: 'top right'},
                {url: 'https://images.hdqwalls.com/wallpapers/fashion-model-4k-9k.jpg' , position: 'top center'},
            ];
            const login = document.getElementsByClassName('login')[0];
            login.style.backgroundImage = `url(${login_background_data[4].url})`;
            login.style.backgroundPosition = `${login_background_data[4].position}`;
        // login background changer


    </script>
    <script src="{{asset('dist/js/login.js')}}"></script>
    <script src="{{asset('dist/js/app.js')}}"></script>
</body>
</html>
