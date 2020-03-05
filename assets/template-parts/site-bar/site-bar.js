jQuery('document').ready(function($){

  $( "#dropdown" ).click(function() {
    document.getElementById("main-menu").classList.toggle("show");
  });



  // Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.button')) {
    var dropdowns = document.getElementsByClassName("main-menu");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

});
