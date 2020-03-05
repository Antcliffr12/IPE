jQuery(".team-member").hover( function () {
    jQuery(this).find('.team-member-info').fadeOut(1000);
    // jQuery(this).fadeOut();
 }, function(){
    jQuery(this).find('.team-member-info').fadeIn("slow");
 });
