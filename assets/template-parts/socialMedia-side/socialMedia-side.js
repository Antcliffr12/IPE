jQuery(document).ready(function($) {
    $(window).bind("load resize", function(){
    setTimeout(function() {
    var container_width = $('#fb-container').width();
      $('#fb-container').html('<div class="fb-page" ' +
      'data-href="https://www.facebook.com/cloverepublic/"' +
      ' data-width="' + container_width + '" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="http://www.facebook.com/IniciativaAutoMat"><a href="https://www.facebook.com/cloverepublic/">Clove Republic</a></blockquote></div></div>');
      FB.XFBML.parse( );
    }, 100);
  });
  });