jQuery("video, img").each(function() {
	var orig = jQuery(this);
	var ratio = orig.attr("height") / orig.attr("width");
	var parWidth = orig.parents().find("p:last").width();
	if(orig.attr("width")> parWidth) {
		orig
			.attr("width", parWidth)
			.attr("height", (parWidth * ratio));
	}
});

// var touchSensitivity = 5;
// jQuery(".carousel").on("touchstart", function (event) {
//     var xClick = event.originalEvent.touches[0].pageX;
//     jQuery(this).one("touchmove", function (event) {
//         var xMove = event.originalEvent.touches[0].pageX;
//         if (Math.floor(xClick - xMove) > touchSensitivity) {
//             jQuery(this).carousel('next');
//         } else if (Math.floor(xClick - xMove) < -(touchSensitivity)) {
//             jQuery(this).carousel('prev');
//         }
//     });
//     jQuery(".carousel").on("touchend", function () {
//         jQuery(this).off("touchmove");
//     });
// });

jQuery('#carouselExampleIndicators').carousel({
    interval: 10000
  });