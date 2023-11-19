// UP_ARROW ICON FUNCTION //

const up_arrow = document.getElementsByClassName('up-arrow')[0];
up_arrow.addEventListener('click',()=>{
    if(window.scrollY > 0)
        window.scrollTo(0,0)
})

// UP_ARROW ICON FUNCTION //


// HEADER-TOP FIXED FUNCTION //

window.onscroll = ()=>{
    if(window.scrollY > 80)
        document.getElementsByClassName('header-top')[0].classList.add('fixed')
    else
        document.getElementsByClassName('header-top')[0].classList.remove('fixed')
}

// HEADER-TOP FIXED FUNCTION //


//  HEADER-TOP MENU MOBILE SIZE FUNCTION //

    const menu_icon = document.getElementsByClassName('menu_icon')[0];
    const mobile_menu_wrapper = document.getElementsByClassName('header-top-menu-mobile-wrapper')[0];
    const header_top = document.getElementsByClassName('header-top')[0];

    $('.header-top-menu-mobile-wrapper > ul > li:not(#train-list-item) a').on('click',()=>{
        mobile_menu_wrapper.classList.remove('show-menu');
    })

    mobile_menu_wrapper.addEventListener('click',(e)=>{
        e.stopPropagation();
    })

    menu_icon.addEventListener('click',(e)=>{
        e.stopPropagation();
        $('li#train-list-item').removeClass('active');
        $('.train-menu').removeClass('show-sub-menu');
        mobile_menu_wrapper.classList.toggle('show-menu');
    })

    header_top.addEventListener('click',()=>{
        mobile_menu_wrapper.classList.remove('show-menu');
    })


    // SUB MENU FUNCTION //

        $('#train-list-item > a').on('click',()=>{
            $('li#train-list-item').toggleClass('active');
            $('.train-menu').toggleClass('show-sub-menu');
        })

    // SUB MENU FUNCTION //




//  HEADER-TOP MENU MOBILE SIZE FUNCTION //
