!(function (n) {
    "use strict";
    function s() {
        for (
            var e = document
                .getElementById("topnav-menu-content")
                .getElementsByTagName("a"),
            t = 0,
            n = e.length;
            t < n;
            t++
        )
            "nav-item dropdown active" === e[t].parentElement.getAttribute("class") &&
                (e[t].parentElement.classList.remove("active"),
                    e[t].nextElementSibling.classList.remove("show"));
    }

    var a;
    n(".side-menu"),
        n("#vertical-menu-btn").on("click", function (e) {
            e.preventDefault(),
                n("body").toggleClass("sidebar-enable"),
                992 <= n(window).width()
                    ? n("body").toggleClass("vertical-collpsed")
                    : n("body").removeClass("vertical-collpsed");
        }),
        n("body,html").click(function (e) {
            var t = n("#vertical-menu-btn");
            t.is(e.target) ||
                0 !== t.has(e.target).length ||
                e.target.closest("div.vertical-menu") ||
                n("body").removeClass("sidebar-enable");
        }),
        n("#sidebar-menu a").each(function () {
            var e = window.location.href.split(/[?#]/)[0];
            this.href == e &&
                (n(this).addClass("active"),
                    n(this).parent().addClass("mm-active"),
                    n(this).parent().parent().addClass("mm-show"),
                    n(this).parent().parent().prev().addClass("mm-active"),
                    n(this).parent().parent().parent().addClass("mm-active"),
                    n(this).parent().parent().parent().parent().addClass("mm-show"),
                    n(this)
                        .parent()
                        .parent()
                        .parent()
                        .parent()
                        .parent()
                        .addClass("mm-active"));
        }),
        n(".navbar-nav a").each(function () {
            var e = window.location.href.split(/[?#]/)[0];
            this.href == e &&
                (n(this).addClass("active"),
                    n(this).parent().addClass("active"),
                    n(this).parent().parent().addClass("active"),
                    n(this).parent().parent().parent().addClass("active"),
                    n(this).parent().parent().parent().parent().addClass("active"),
                    n(this)
                        .parent()
                        .parent()
                        .parent()
                        .parent()
                        .parent()
                        .addClass("active"));
        }),
        n(document).ready(function () {
            var e;
            0 < n("#sidebar-menu").length &&
                0 < n("#sidebar-menu .mm-active .active").length &&
                300 < (e = n("#sidebar-menu .mm-active .active").offset().top) &&
                ((e -= 300),
                    n(".vertical-menu .simplebar-content-wrapper").animate(
                        { scrollTop: e },
                        "slow"
                    ));
        });
})(jQuery);
