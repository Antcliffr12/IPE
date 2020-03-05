// Search Bar & Toggle
jQuery('.fa-search').on('click', function() {
    jQuery('.search').toggle('display: flex');
  });
  
  
  jQuery(document).mouseup(function(e) 
  {
      var container = jQuery(".search");
  
      // if the target of the click isn't the container nor a descendant of the container
      if (!container.is(e.target) && container.has(e.target).length === 0) 
      {
          container.hide();
      }
  });