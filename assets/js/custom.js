$(document).ready(function() {

  $("main#spapp > section").height($(document).height() -60);

  var app = $.spapp({pageNotFound : 'error_404'}); // initialize

  // run app
  app.run();

 

});

