$(document).ready(function () {
  $(window).scroll(function () {
    // sticky navbar on scroll script
    if (this.scrollY > 20) {
      $(".navbar_main_div").removeClass("sticky_nav");
      $(".navbar_butn").removeClass("sticky_butn");
    } else {
      $(".navbar_main_div").addClass("sticky_nav");
      $(".navbar_butn").addClass("sticky_butn");
    }
  });
});
