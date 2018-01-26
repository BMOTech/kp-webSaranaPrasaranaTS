  //------------//
 // scrollspy  //
//------------//
  $(window).scroll(function() {

    if ($(document).scrollTop()) {
      $('.navbar-fixed').addClass('scrolled');
      $('.umah').css('color', 'black');
      $('.tentang').css('color', 'black');
      $('.contacte').css('color', 'black');
      $('.glyphicon-log-in').css('color', 'black');
      $('.glyphicon-user').css('color', 'black');
      $('.logine').css('color', 'black');
      $('.daftare').css('color', 'black');

      // $('.navigasi').animate({background: '#f7faff', filter: 'unset'}, 800);
    } else {
      $('.navbar-fixed').removeClass("scrolled");
      $('.umah').css('color', '#f7faff');
      $('.tentang').css('color', '#f7faff');
      $('.contacte').css('color', '#f7faff');
      $('.glyphicon-log-in').css('color', '#f7faff');
      $('.glyphicon-user').css('color', '#f7faff');
      $('.daftare').css('color', '#f7faff');
      $('.logine').css('color', '#f7faff');
      
    }
  });
/*end scrollspy*/