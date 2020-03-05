jQuery('document').ready(function($){

    var $slider = $('#slider'),
        $prev = $('#prev'),
        $next = $('#next'),
        $slide = $slider.find('.text p');
        var currentSlide = 0,
        allSlides = $slider.find('p').length - 1; // index start from 0

        $slider.find('div p').eq(0).show();


    function nextSlide() {
      if(currentSlide < allSlides) {


          $slide.eq(currentSlide).fadeOut(200);
          $slide.eq(currentSlide + 1).fadeIn(200);

          currentSlide+=1;
      }

    }

    function prevSlide() {

      if(currentSlide > 0) {

          $slide.eq(currentSlide).fadeOut(200);
          $slide.eq(currentSlide - 1).fadeIn(200);

          currentSlide-=1;
      }
    }

  $next.on('click', nextSlide);
  $prev.on('click', prevSlide);

});
