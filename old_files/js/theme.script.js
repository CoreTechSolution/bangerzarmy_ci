jQuery(function($){
    jQuery('.nav').slicknav({
        prependTo:'#rspnavigation',
        label:''
    });

    jQuery('.fancybox-media').fancybox({
        openEffect  : 'none',
        closeEffect : 'none',
        maxWidth	: 800,
        maxHeight	: 600,
        helpers : {
            media : {}
        }
    });


    $('.matchheight').matchHeight();
    $('.matchheight1').matchHeight();
    $('.short_description').matchHeight();

    jQuery('.fbreviewslider').bxSlider({
        auto: true,
        pager: false,
        minSlides: 1,
        maxSlides: 3,
        slideWidth: 230,
        moveSlides: 1,
        slideMargin: 20,
        infiniteLoop: true,
        /*nextSelector: '#slider-next3',
        prevSelector: '#slider-prev3',*/
        //nextText: '<img src="<?php bloginfo('template_directory'); ?>/images/right-arrow.png">',
        //prevText: '<img src="<?php bloginfo('template_directory'); ?>/images/left-arrow.png">'
    });
});
//new WOW().init();