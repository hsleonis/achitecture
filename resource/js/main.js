/*
 EMRAN ARCHITECT & ASSOCIATES. v2.1
 (c) 2015 DCASTALIA, http://dcastalia.com
 License: GPL v3
 Author: MD. Hasan Shahriar
 Author email: hsleonis2@gmail.com
*/

// document.oncontextmenu = document.body.oncontextmenu = function() {return false;}

// $('.right-side-area').scrollTop($('#dc').offset().top);

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

// Slide to Left
function slideLeft(item) {
    $(item).animate({
        left: -100 + '%'
    }, 500);
}

// Slide to Bottom
function slideRight(item) {
    $(item).animate({
        left: 0
    }, 500);
}

// Toggle info panel
$(document).on("click",".info-btn",function(){
    if($(this).hasClass("info-opened")) {
        slideLeft(".info-menu-wrapper");
        $(this).removeClass("info-opened");
    }
    else {
        slideRight(".info-menu-wrapper");
        $(this).addClass("info-opened");
    }
});

// List hover
$(document).on("mouseover",".project-list li",function(){
    var img = $(this).attr('data-image');
    $(".project-view-box img").attr('src',img);
});

$(document).on("click",".top-menu li a", function() {
    setTimeout(function(){
        $(".menu-bottom > li:nth-child(1) > a:nth-child(1)").addClass("active-bm");
    },300);
});

// Images loader
$('img').error(function(){
    $(this).attr('src', "resource/css/ajax-loader.gif");
});

// Initialize scrollbar
function scrollbar(){
    var full = $(window).height();
    var fullWidth = $(window).width();
    var h = (full - 144) * 0.75;
    var w = (h * 1.62) + 20;
    if(fullWidth<=w+80) {
        var ex = (w-fullWidth+80);
        console.log(h+' '+w);
        w -= ex;
        h -= ex * 0.62;
        console.log(h+' '+w);
    }
    /*$(".height-wrapper").css("height", h+"px");
    $("#main-wrapper").css("width",w+"px");
    var h = (full - 144) * 0.8;
    var w = (h * 1.62) + 20;
    if(fullWidth<800) {
        w = fullWidth-80;
        h= (w * 0.62) + 144;
    }*/
    $(".height-wrapper").css("height", h+"px");
    $("#main-wrapper").css("width",w+"px");
    $('.right-side-area').perfectScrollbar({
        maxScrollbarLength: 15,
        minScrollbarLength: 15
    });
    angular.element(".right-side-area").ready(function(){
        $('.right-side-area').perfectScrollbar('update');
    });
}

// Slick previous
$(document).on("click",".prv-slick",function(){
    $(".slick-prev").click();
});

// Slick next
$(document).on("click",".nxt-slick",function(){
    $(".slick-next").click();
});

// Update scrollbar
function scrollbarUpdate(){
    $('.right-side-area').perfectScrollbar('update');
}

// Window resize
$(window).resize(function () {
    scrollbar();
});

// Document ready
$(document).ready(function () {
    scrollbar();
});

// Window load
$(window).load(function(){
    $('.preload').css({visibility: 'hidden'});
});