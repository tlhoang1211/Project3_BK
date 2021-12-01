(function ($)
{

    "use strict";

    // Sticky nav
    const $headerStick = $(".Sticky");
    $(window).on("scroll", function ()
    {
        if ($(this).scrollTop() > 80)
        {
            $headerStick.addClass("fade-away");
        }
        else
        {
            $headerStick.removeClass("fade-away");
        }
    });

    // Menu Categories
    $(window).resize(function ()
    {
        if ($(window).width() >= 768)
        {
            $("a[href=\"#\"]").on("click", function (e)
            {
                e.preventDefault();
            });
            $(".categories").addClass("menu");

            $(".menu ul > li").hover(function (e)
            {
                e.stopPropagation();

                $(this).find("ul:first").delay(50).fadeIn();
                $(this).find("> span a").addClass("active");
            }, function ()
            {
                $(this).find("ul:first").delay(50).fadeOut();
                $(this).find("> span a").removeClass("active");
            });

            $(".menu ul li li").stop().on("mouseover", function (e)
            {
                if ($(this).has("ul").length)
                {
                    $(this).parent().addClass("expanded");
                }
                $(".menu ul:first", this).parent().find("> span a").addClass("active");
                $(".menu ul:first", this).show();
            }).stop().on("mouseout", function (e)
            {
                $(this).parent().removeClass("expanded");
                $(".menu ul:first", this).parent().find("> span a").removeClass("active");
                $(".menu ul:first", this).hide();
            });
        }
        else
        {
            $(".categories").removeClass("menu");
        }
    }).resize();

    // Mobile Mmenu
    const $menu = $("#menu").mmenu({
            "extensions": ["pagedim-black"],
            counters: true,
            keyboardNavigation: {
                enable: true,
                enhance: true
            },
            navbar: {
                title: "MENU"
            },
            offCanvas: {
                pageSelector: "#page"
            },
            navbars: [{position: "bottom", content: ["<a href=\"#0\">© 2020 Allaia</a>"]}]
        },
        {
            // configuration
            clone: true,
            classNames: {
                fixedElements: {
                    fixed: "menu_fixed"
                }
            }
        });

    // Menu
    $("a.open_close").on("click", function ()
    {
        $(".main-menu").toggleClass("show");
        $(".layer").toggleClass("layer-is-visible");
    });
    $("a.show-submenu").on("click", function ()
    {
        $(this).next().toggleClass("show_normal");
    });
    $("a.show-submenu-mega").on("click", function ()
    {
        $(this).next().toggleClass("show_mega");
    });

    $("a.btn_search_mob").on("click", function ()
    {
        $(".search_mob_wp").slideToggle("fast");
    });

    // Carousel product page
    $(".prod_pics").owlCarousel({
        items: 1,
        loop: false,
        margin: 0,
        dots: true,
        lazyLoad: true,
        nav: false
    });

    // Carousel
    $(".products_carousel").owlCarousel({
        center: false,
        items: 2,
        loop: false,
        margin: 10,
        dots: false,
        nav: true,
        lazyLoad: true,
        navText: ["<i class='ti-angle-left'></i>", "<i class='ti-angle-right'></i>"],
        responsive: {
            0: {
                nav: false,
                dots: true,
                items: 2
            },
            560: {
                nav: false,
                dots: true,
                items: 3
            },
            768: {
                nav: false,
                dots: true,
                items: 4
            },
            1024: {
                items: 4
            },
            1200: {
                items: 4
            }
        }
    });

    // Carousels
    $(".carousel_centered").owlCarousel({
        center: true,
        items: 2,
        loop: true,
        margin: 10,
        responsive: {
            0: {
                items: 1,
                dots: false
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });

    // Carousel brands
    $("#brands").owlCarousel({
        autoplay: true,
        items: 2,
        loop: true,
        margin: 10,
        dots: false,
        nav: false,
        lazyLoad: true,
        autoplayTimeout: 3000,
        responsive: {
            0: {
                items: 3
            },
            767: {
                items: 4
            },
            1000: {
                items: 6
            },
            1300: {
                items: 8
            }
        }
    });

    // Countdown offers
    $("[data-countdown]").each(function ()
    {
        const $this = $(this), finalDate = $(this).data("countdown");
        $this.countdown(finalDate, function (event)
        {
            $this.html(event.strftime("%DD %H:%M:%S"));
        });
    });

    // Lazy load
    const lazyLoadInstance = new LazyLoad({
        elements_selector: ".lazy"
    });

    // Jquery select
    $(".custom-select-form select").niceSelect();

    // Product page color select
    $(".color").on("click", function ()
    {
        $(".color").removeClass("active");
        $(this).addClass("active");
    });

    /* Input incrementer*/
    $(".numbers-row").append("<div class=\"inc button_inc\">+</div><div class=\"dec button_inc\">-</div>");
    $(".button_inc").on("click", function ()
    {
        let newVal;
        const $button = $(this);
        const oldValue = $button.parent().find("input").val();
        if ($button.text() === "+")
        {
            newVal = parseFloat(oldValue) + 1;
        }
        else
        {
            // Don't allow decrementing below zero
            if (oldValue > 1)
            {
                newVal = parseFloat(oldValue) - 1;
            }
            else
            {
                newVal = 0;
            }
        }
        $button.parent().find("input").val(newVal).change();
    });

    // Hide logo, display search bar
    let logo_is_displayed = true;
    $("#search_icon").stop().click(function (e)
    {
        $(this).css("disabled", true);
        e.stopPropagation();

        $(`#${logo_is_displayed ? "logo" : "search_bar"}`).stop(true, true).delay(50).fadeToggle(200, () =>
        {
            $(`#${logo_is_displayed ? "search_bar" : "logo"}`).stop(true, true).delay(50).fadeToggle(100, () =>
            {
                logo_is_displayed = !logo_is_displayed;
                $(this).css("disabled", false);
            });
        });
    });

    // Switch back to logo if click outside of the searchbar
    $(document).click((e) =>
    {
        if (!logo_is_displayed && !$(e.target).closest("#search_bar").length)
        {
            $("#search_icon").trigger("click");
        }
    });
    // $(window).on("scroll", () =>
    // {
    //     if (!logo_is_displayed)
    //     {
    //         $("#search_icon").trigger("click");
    //     }
    // });

    /* Cart dropdown */
    $(".dropdown-cart").click(() =>
    {
        window.location.href = "/cart/page";
    });

    // Account dropdown
    $(".user-page").click(() =>
    {
        window.location.href = "/user/account/profile";
    });

    $(".dropdown-cart, .dropdown-access").hover(function ()
    {
        $(this).find(".dropdown-menu").stop().delay(50).fadeIn(300);
    }, function ()
    {
        $(this).find(".dropdown-menu").stop().delay(50).fadeOut(300);
    });

    /* Cart Dropdown Hidden From tablet */
    $(window).bind("load resize", function ()
    {
        const width = $(window).width();
        if (width <= 768)
        {
            $("a.cart_bt, a.access_link").removeAttr("data-toggle", "dropdown");
        }
        else
        {
            $("a.cart_bt,a.access_link").attr("data-toggle", "dropdown");
        }
    });

    // Opacity mask
    $(".opacity-mask").each(function ()
    {
        $(this).css("background-color", $(this).attr("data-opacity-mask"));
    });

    /* Animation on scroll */
    new WOW().init();

    // Forgot Password
    $("#forgot").on("click", function ()
    {
        $("#forgot_pw").fadeToggle("fast");
    });

    //Footer collapse
    const $headingFooter = $("footer h3");
    $(window).resize(function ()
    {
        if ($(window).width() <= 768)
        {
            $headingFooter.attr("data-toggle", "collapse");
        }
        else
        {
            $headingFooter.removeAttr("data-toggle", "collapse");
        }
    }).resize();
    $headingFooter.on("click", function ()
    {
        $(this).toggleClass("opened");
    });

    /* Footer reveal */
    if ($(window).width() >= 1024)
    {
        $("footer.revealed").footerReveal({
            shadow: false,
            opacity: 0.6,
            zIndex: 1
        });
    }


    // Scroll to top
    const pxShow = 800; // height on which the button will show
    const scrollSpeed = 500; // how slow / fast you want the button to scroll to top.
    $(window).scroll(function ()
    {
        if ($(window).scrollTop() >= pxShow)
        {
            $("#toTop").addClass("visible");
        }
        else
        {
            $("#toTop").removeClass("visible");
        }
    });
    $("#toTop").on("click", function ()
    {
        $("html, body").animate({scrollTop: 0}, scrollSpeed);
        return false;
    });

    // Tooltip
    $(window).resize(function ()
    {
        if ($(window).width() <= 768)
        {
            $(".tooltip-1").tooltip("disable");
        }
        else
        {
            $(".tooltip-1").tooltip({html: true});
        }
    }).resize();

    // Modal Sign In
    $("#sign-in").magnificPopup({
        type: "inline",
        fixedContentPos: true,
        fixedBgPos: true,
        overflowY: "auto",
        closeBtnInside: true,
        preloader: false,
        midClick: true,
        removalDelay: 300,
        closeMarkup: "<button title=\"%title%\" type=\"button\" class=\"mfp-close\"></button>",
        mainClass: "my-mfp-zoom-in"
    });

    // Image popups
    $(".magnific-gallery").each(function ()
    {
        $(this).magnificPopup({
            delegate: "a",
            type: "image",
            preloader: true,
            gallery: {
                enabled: true
            },
            removalDelay: 500, //delay removal by X to allow out-animation
            callbacks: {
                beforeOpen: function ()
                {
                    // just a hack that adds mfp-anim class to markup
                    this.st.image.markup = this.st.image.markup.replace("mfp-figure", "mfp-figure mfp-with-anim");
                    this.st.mainClass = this.st.el.attr("data-effect");
                }
            },
            closeOnContentClick: true,
            midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
        });
    });

    // Popup up
    setTimeout(function ()
    {
        $(".popup_wrapper").css({
            "opacity": "1",
            "visibility": "visible"
        });
        $(".popup_close").on("click", function ()
        {
            $(".popup_wrapper").fadeOut(300);
        });
    }, 1500);


})(window.jQuery);
