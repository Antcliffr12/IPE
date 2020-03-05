if ( window.location.pathname == '/' ){
    // Index (home) page
    console.log('home');
  } else {
    // Other page
    console.log(window.location.pathname);
    var element = document.getElementById("home_icon");
    element.classList.remove("active");
  }