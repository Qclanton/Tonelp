    (function($) {  
    $(function() {  
      
      $('ul.tabs').on('click', 'li:not(.current)', function() {  
          $(this).addClass('current').siblings().removeClass('current')  
              .parents('div.videot-wrapper').find('div.box').eq($(this).index()).fadeIn(150).siblings('div.box').hide();  
      })  
      
    })  
    })(jQuery)  