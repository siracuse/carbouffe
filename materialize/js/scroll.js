$(document).scroll(function() {
  var scroll = $(this).scrollTop();
  if (scroll >= 150) {
    $("#popUp").css("margin-left", "-825px");
    $("#plus").css("margin-left", "0px");
  }
});

$("#plus").click(function() {
  $("#popUp").css("margin-left", "0px");
  $("#plus").css("margin-left", "-825px");
});

$("#close").click(function() {
  $("#popUp").css("margin-left", "-825px");
  $("#plus").css("margin-left", "0px");
});