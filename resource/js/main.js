/*
 EMRAN ARCHITECT & ASSOCIATES. v2.1
 (c) 2015 DCASTALIA, http://dcastalia.com
 License: GPL v3
 Author: MD. Hasan Shahriar
 Author email: hsleonis2@gmail.com
  _____   _____           _____ _______       _      _____          
 |  __ \ / ____|   /\    / ____|__   __|/\   | |    |_   _|   /\    
 | |  | | |       /  \  | (___    | |  /  \  | |      | |    /  \   
 | |  | | |      / /\ \  \___ \   | | / /\ \ | |      | |   / /\ \  
 | |__| | |____ / ____ \ ____) |  | |/ ____ \| |____ _| |_ / ____ \ 
 |_____/ \_____/_/    \_\_____/   |_/_/    \_\______|_____/_/    \_\
 
*/

// Make vertically responsive
function verticalResponse() {
  var a = $(window).height(), b = a / 2, c = a / 3, d = a / 4, e = a / 5, f = a / 6, g = a / 7, h = a / 8, k = a / 9, l = a / 10;
  $(".row-1").height(a + "px");
  $(".row-2").height(b + "px");
  $(".row-3").height(c + "px");
  $(".row-4").height(d + "px");
  $(".row-5").height(e + "px");
  $(".row-6").height(f + "px");
  $(".row-7").height(g + "px");
  $(".row-8").height(h + "px");
  $(".row-9").height(k + "px");
  $(".row-10").height(l + "px");
};

// Slide to left
function slideLeft(item) {
    $(item).animate({
        display: 'block',
        width: 50 + '%',
        right: 0
    }, 500);
}

// Slide to right
function slideRight(item) {
    $(item).animate({
        width: 0,
        right: -50 + '%',
        display: 'none'
    }, 500);
}

// Images loader
$('img').error(function(){
    $(this).attr('src', "resources/img/imgloader.gif");
});

// Window resize
$(window).resize(function () {

});

// Document ready
$(document).ready(function () {

});