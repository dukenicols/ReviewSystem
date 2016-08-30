// Page Animate setup
// ==================
$(document).ready(function() {
    $('.animsition').css({
      "animation-duration": '0s'
    });

    var reference = $('.example-title').offset().top,
        $sidebar  = $('#sidebar');
        $sidebarHg = $sidebar.height();
    $(window).scroll(function() {
      var position  = $(window).scrollTop();
      if((position + 90) > reference) {
        $sidebar.addClass('fixed');
        $sidebar.height($sidebarHg);
        return;
      } else if( position < reference ) {
        $sidebar.removeClass('fixed');
        return;
      }
    });
});
