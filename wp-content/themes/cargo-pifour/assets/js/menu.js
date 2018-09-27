(function ($) {
    "use strict";
    $(document).ready(function(){
        if($(window).width() >= 1200){
             $('.nav-menu > li').each(function(){
                var $submenu = $(this).find('>ul');
                if($submenu.length == 1){
                    $(this).hover(function(){  
                        if($submenu.offset().left + $submenu.width() > $(window).width()){  
                            $submenu.addClass('back');
                        }else if($submenu.offset().left < 0){
                            $submenu.addClass('back');
                        }
                    }, function(){
                        $submenu.removeClass('back');
                    });
                }
            });
         }

   if($(window).width() >= 1200){
        $('ul.sub-menu > li').each(function(){  
            var $submenu = $(this).find('>ul');
            if($submenu.length == 1){
                $(this).hover(function(){  
                    if($submenu.offset().left + $submenu.width() > $(window).width()){  
                        $submenu.addClass('back');
                    }else if($submenu.offset().left < 0){
                        $submenu.addClass('back');
                    }
                }, function(){
                    $submenu.removeClass('back');
                });
            }
        });
    }
        /* Menu drop down*/
        $('.nav-menu li.menu-item-has-children').append('<span class="cs-menu-toggle"><i class="fa fa-angle-down"></i></span>');

        $('.cs-menu-toggle').live('click', function(){  
            if ($(this).hasClass('active')){
                $(this).removeClass('active');
                $(this).prev().toggleClass('submenu-open').slideUp();
            }else{
                $(this).addClass('active');
                $(this).prev().toggleClass('submenu-open').slideDown();
            }
            
        });
        if($(window).width() < 1200){
            $('.menu-main-menu .menu-item-has-children > a').live('click', function(event){  
                event.preventDefault();
                event.stopPropagation();
                if($(this).parent().find('.cs-menu-toggle').hasClass('active')){
                    $(this).parent().find('.cs-menu-toggle').removeClass('active');
                    $(this).next('ul').toggleClass('submenu-open').slideUp();
                }else{
                    $(this).parent().find('.cs-menu-toggle').addClass('active');
                    $(this).next('ul').toggleClass('submenu-open').slideDown();
                }
            });
        }
        /* Page Fixed Menu */
        $('.header-fixed-page').parents('body').addClass('remove-margin-top');
        $('#cshero-header.no-sticky').parents('body').addClass('remove-margin-top');
    });

})(jQuery);
