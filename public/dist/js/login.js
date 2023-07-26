const forms = [
    'login-section-first',
    'login-section-second',
]

var step = 0;
const phone_continue_btn = document.getElementById('phone-continue');
phone_continue_btn.onclick = ()=>{
    step = 1;
    document.getElementsByClassName(forms[step-1])[0].classList.toggle('invisible');
    document.getElementsByClassName(forms[step])[0].classList.toggle('invisible');
}
