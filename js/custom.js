$(document).ready(function() {
    $("body").hide().fadeIn("fast")
}), $("#menu-close").click(function(e) {
    e.preventDefault(), $("#sidebar-wrapper").toggleClass("active")
}), $("#menu-toggle").click(function(e) {
    e.preventDefault(), $("#sidebar-wrapper").toggleClass("active")
}), $(function() {
    $("a[href*=#]:not([href=#],[data-toggle],[data-target],[data-slide])").click(function() {
        if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") || location.hostname == this.hostname) {
            var e = $(this.hash);
            if ((e = e.length ? e : $("[name=" + this.hash.slice(1) + "]")).length) return $("html,body").animate({
                scrollTop: e.offset().top
            }, 1e3), !1
        }
    })
});
var fixed = !1;
$(document).scroll(function() {
    $(this).scrollTop() > 250 ? fixed || (fixed = !0, $("#to-top").show("slow", function() {
        $("#to-top").css({
            position: "fixed",
            display: "block"
        })
    })) : fixed && (fixed = !1, $("#to-top").hide("slow", function() {
        $("#to-top").css({
            display: "none"
        })
    }))
}), $(".map").click(function() {
    $("#map").css("pointer-events", "auto")
}), $(".map").mouseleave(function() {
    $("#map").css("pointer-events", "none")
}), jQuery(".nav a").click(function() {
    "#" === jQuery(this).attr("href") || $("#navbar").removeClass("in")
});
var img1 = "url(./img/slider/1.png)",
    img2 = "url(./img/slider/2.png)",
    img3 = "url(./img/slider/3.png)",
    img4 = "url(./img/slider/4.png)";
$(document).ready(function() {
    var e = ["1.png", "2.png", "3.png", "4.png"],
        t = 0;
    setInterval(function() {
        switch (t == e.length && (t = 0), t) {
            case 0:
                $("#bullets li a").removeClass("active"), $("#bullet1").addClass("active");
                break;
            case 1:
                $("#bullets li a").removeClass("active"), $("#bullet2").addClass("active");
                break;
            case 2:
                $("#bullets li a").removeClass("active"), $("#bullet3").addClass("active");
                break;
            case 3:
                $("#bullets li a").removeClass("active"), $("#bullet4").addClass("active")
        }
        $("header").css("background-image", 'url("./img/slider/' + e[t++] + '")')
    }, 4e3)
}), $("#bullet1").on("click", function() {
    $("header").css("background-image", img1), $("#bullets li a").removeClass("active"), $(this).addClass("active")
}), $("#bullet2").on("click", function() {
    $("header").css("background-image", img2), $("#bullets li a").removeClass("active"), $(this).addClass("active")
}), $("#bullet3").on("click", function() {
    $("header").css("background-image", img3), $("#bullets li a").removeClass("active"), $(this).addClass("active")
}), $("#bullet4").on("click", function() {
    $("header").css("background-image", img4), $("#bullets li a").removeClass("active"), $(this).addClass("active")
});
var currentURL = window.location.href;
$(".fb_share").click(function() {
    $(this).attr("href", "https://www.facebook.com/share.php?u=" + currentURL)
}), $(".gg_share").click(function() {
    $(this).attr("href", "https://plus.google.com/share?url=" + currentURL)
}), $(".tw_share").click(function() {
    $(this).attr("href", "https://twitter.com/intent/tweet?url=" + currentURL)
});

