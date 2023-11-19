//  DOCUMENT FUNCTION
    $(document).on('click',()=>{
        $('.profile-menu').removeClass('active');
        $('.notification-box').removeClass('active');
        $('.message-box').removeClass('active');
    })
//  DOCUMENT FUNCTION

// PROFILE MENU FUNCTION

    $('.profile-menu').on('click',(e)=>{
        e.stopPropagation();
    })

    $('li.profile').on('click',(e)=>{
        e.stopPropagation();
        $('.profile-menu').toggleClass('active');
    })

// PROFILE MENU FUNCTION


// NOTIFICATION MENU FUNCTION

    $('.notification-box').on('click',(e)=>{
        e.stopPropagation();
    })
    
    $('.notification').on('click',(e)=>{
        e.stopPropagation();
        $('.notification-box').toggleClass('active');
    })

// NOTIFICATION MENU FUNCTION

// MESSAGE MENU FUNCTION

    $('.message-box').on('click',(e)=>{
        e.stopPropagation();
    })
    
    $('.message').on('click',(e)=>{
        e.stopPropagation();
        $('.message-box').toggleClass('active');
    })

// MESSAGE MENU FUNCTION

// MENU SIDE FUNCTION

    $('.menu-icon').on('click',()=>{
        $('section.menu').toggleClass('hidden');
        $('section.content').toggleClass('full-width');
    })

// MENU SIDE FUNCTION


// SEARCH INPUT FUNCTION

    $('.search-input').focus(()=>{
        $('.menu-header-search > form').addClass('active');
    })

    $('.search-input').blur(()=>{
        $('.menu-header-search > form').removeClass('active');
    })

// SEARCH INPUT FUNCTION


// SUB MENU FUNCTION

    $('.sub').on('click',()=>{
        $('.sub').toggleClass('show-sub-menu');
    })

// SUB MENU FUNCTION


// CUSTOM CARD FUNCTION
    $('.default-buttons>button').on('click',(e)=>{
        const custom_card = e.target.parentNode.parentNode.parentNode.parentNode.parentNode; 
        $(custom_card).toggleClass('show-content')
    })
// CUSTOM CARD FUNCTION

