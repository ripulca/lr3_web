$('.header_nav_auth_btn').click(function () {
    if(!$('.dark_background').hasClass('open')){ 
        $('.dark_background').addClass(' open');
        $('.enter').addClass(' open');
    }
    
    if($('.modal_change_btns').hasClass('close')){ 
        $('.modal_change_btns').removeClass(' close');
    }
})

$('.add_content_btn').click(function(){
    photoPerPage=9;
    lastId = $('.photo_card').filter(':last').attr('data-id');
    pageNum=parseInt((parseInt(lastId)+1)/photoPerPage);
    lastLine=$('.main_photos_row').filter(':last');
    $.ajax({
        url:'page/'.pageNum,  
        method: 'POST', 
        dataType: 'html',
        data: {
            pageNum: pageNum
        },
        success:function(data){
            lastLine.after(data);
        }
    });
});

$('.dark_background').mouseup(function (e) {
    let modal_win = $(".modal_win");
    if (!modal_win.is(e.target) && modal_win.has(e.target).length === 0) {
        $('.dark_background').removeClass(' open');
        if($('.msg-reg').hasClass('open')){
            $('.msg-reg').removeClass(' open');
        }
        if($('.msg-enter').hasClass('open')){
            $('.msg-enter').removeClass(' open');
        }
        if($('.enter').hasClass('open')){ 
            $('.enter').removeClass(' open');
        }
        if($('.registration').hasClass('open')){ 
            $('.registration').removeClass(' open');
        }
        if($('.msg-photo').hasClass('open')){
            $('.msg-photo').removeClass(' open');
        }
        if($('.add_photo').hasClass('open')){
            $('.add_photo').removeClass(' open');
        }
    }
});