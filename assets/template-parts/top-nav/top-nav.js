// function classToggle() {
//   const navs = document.querySelectorAll('.Navbar__Items')
  
//    navs.forEach(nav => nav.classList.toggle('Navbar__ToggleShow'));
// }

// document.querySelector('.Navbar__Link-toggle')
//   .addEventListener('click', classToggle);

jQuery('document').ready(function($){

  
    jQuery( "#mobile_menu" ).click(function() {
  
      $('#menu-bottom > li').addClass( 'moved-item' );
      $('#menu-bottom > li').appendTo( '#menu-top' );
  
      $('li.moved-item').insertBefore("#menu-top");
  
  
  
        
  
       $('.rvt-header__main-nav').delay(1).slideToggle(1000);
       $('.rvt-header__main-nav').addClass('opened menu');


      jQuery(function($){
        $(document).ready(function(){
          $('ul[data-menudepth="1"]').parent().addClass('drop-down'); // Add Sub-Menu Class to insert personalized style
        });
      });

        // slideToggle for mobile mainmenu
        // $('.drop-down').click(function(e) {
        //   e.stopPropagation();
        //   $(this).find('>[class*="sub-menu"]').slideToggle('slow');
        // });

        $('nav > .menu-item').click(function(){
          $(this).children('.sub-menu').slideToggle('slow');
        });

      console.log('nav > .menu-item');
  
      
    });
      
  });
  
  
