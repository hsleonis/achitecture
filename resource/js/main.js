/*
 EMRAN ARCHITECT & ASSOCIATES. v2.1
 (c) 2015 DCASTALIA, http://dcastalia.com
 License: GPL v3
 Author: MD. Hasan Shahriar
 Author email: hsleonis2@gmail.com
*/

document.oncontextmenu = document.body.oncontextmenu = function() {
    return !1
};

// make vertically responsive
function verticalResponse() {
    var a = $(window).height(),
        b = a / 2,c = a / 3,
        d = a / 4,e = a / 5,
        f = a / 6,g = a / 7,
        h = a / 8,k = a / 9,
        l = a / 10;
    $(".row-1").height(a + "px");
    $(".row-2").height(b + "px");
    $(".row-3").height(c + "px");
    $(".row-4").height(d + "px");
    $(".row-5").height(e + "px");
    $(".row-6").height(f + "px");
    $(".row-7").height(g + "px");
    $(".row-8").height(h + "px");
    $(".row-9").height(k + "px");
    $(".row-10").height(l + "px")
}

// Move info wrapper to left
function slideLeft(a) {
    $(a).stop().removeClass('opening-info').addClass('closing-info');
    $(".more-btn").animate({
        top: "-21px"
    }, 200, function() {
        $(".more-btn").css({
            display: "none"
        });
        $(a).animate({
            left: "-100%"
        }, 500, function() {
            $(this).removeClass('closing-info');
            $('.info-btn').text('INFO >');
        });
    });
}

// Move info wrapper to right
function slideRight(a) {
    $(a).stop().removeClass('closing-info').addClass('opening-info').animate({
        left: 0
    }, 500, function() {
        $(".more-btn a").length || $(".more-btn").css({
            opacity: "0"
        });
        $(".more-btn").css({
            display: "block"
        }).animate({
            top: 0
        }, 200);
        $(this).removeClass('opening-info');
        $('.info-btn').text('INFO <');
    })
}

$(document).on("click", ".info-btn", function() {
    $(this).hasClass("info-opened") ? (slideLeft(".info-menu-wrapper"), $(this).removeClass("info-opened")) : (slideRight(".info-menu-wrapper"), $(this).addClass("info-opened"))
});
$(document).on("mouseover", ".project-list li", function() {
    var a = $(this).attr("data-image");
    $(".project-view-box img").attr("src", a)
});
$(document).on("click", ".top-menu li a", function() {
    setTimeout(function() {
        $(".menu-bottom > li:nth-child(1) > a:nth-child(1)").addClass("active-bm")
    }, 300)
});
$("img").error(function() {
    $(this).attr("src", "resource/css/ajax-loader.gif")
});

// Init scrollbar and main view area
function scrollbar() {
    var a = $(window).height(),
        b = $(window).width(),
        a = .75 * (a - 144),
        c = 1.635 * a + 20;
    b <= c + 80 && (b = c - b + 80, c -= b, a -= .635 * b);
    $(".height-wrapper").css("height", a + "px");
    $("#main-wrapper").css("width", c + "px");
    $(".right-side-area").perfectScrollbar({
        maxScrollbarLength: 15,
        minScrollbarLength: 15
    });
    angular.element(".right-side-area").ready(function() {
        $(".right-side-area").perfectScrollbar("update")
    })
}
$(document).on("click", ".prv-slick", function() {
    $(".slick-prev").click()
});
$(document).on("click", ".nxt-slick", function() {
    $(".slick-next").click()
});

// Update scrollbar
function scrollbarUpdate() {
    $(".right-side-area").perfectScrollbar("update")
}
$(window).resize(function() {
    scrollbar()
});
$(document).ready(function() {
    scrollbar()
});
$(window).load(function() {
    $(".preload").css({
        visibility: "hidden"
    })
});