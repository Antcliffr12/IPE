console.log('ji');
    // manual carousel controls
    jQuery(document).ready(function() {      
        jQuery('#postsCarousel').carousel('pause');
     });
    jQuery('.news-next').click(function(){ jQuery('#postsCarousel').carousel('next');return false; });
    jQuery('.news-prev').click(function(){ jQuery('#postsCarousel').carousel('prev');return false; });
    
