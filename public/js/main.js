/**
 * Template Name: TheEvent - v2.3.0
 * Template URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
 * Author: BootstrapMade.com
 * License: https://bootstrapmade.com/license/
 */
!(function($) {
    "use strict";

    // Back to top button
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $(".back-to-top").fadeIn("slow");
        } else {
            $(".back-to-top").fadeOut("slow");
        }
    });
    $(".back-to-top").click(function() {
        $("html, body").animate(
            {
                scrollTop: 0
            },
            1500,
            "easeInOutExpo"
        );
        return false;
    });

    // Header fixed on scroll
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $("#header").addClass("header-scrolled");
        } else {
            $("#header").removeClass("header-scrolled");
        }
    });

    if ($(window).scrollTop() > 100) {
        $("#header").addClass("header-scrolled");
    }

    // Initialize Venobox
    $(window).on("load", function() {
        $(".venobox").venobox({
            bgcolor: "",
            overlayColor: "rgba(6, 12, 34, 0.85)",
            closeBackground: "",
            closeColor: "#fff",
            share: false
        });
    });

    // Initiate superfish on nav menu
    $(".nav-menu").superfish({
        animation: {
            opacity: "show"
        },
        speed: 400
    });

    // Smooth scroll for the navigation menu and links with .scrollto classes
    var scrolltoOffset = $("#header").outerHeight() - 21;
    if (window.matchMedia("(max-width: 991px)").matches) {
        scrolltoOffset += 20;
    }
    $(document).on("click", ".nav-menu a, #mobile-nav a, .scrollto", function(
        e
    ) {
        if (
            location.pathname.replace(/^\//, "") ==
                this.pathname.replace(/^\//, "") &&
            location.hostname == this.hostname
        ) {
            var target = $(this.hash);
            if (target.length) {
                e.preventDefault();

                var scrollto = target.offset().top - scrolltoOffset;

                if ($(this).attr("href") == "#header") {
                    scrollto = 0;
                }

                $("html, body").animate(
                    {
                        scrollTop: scrollto
                    },
                    1500,
                    "easeInOutExpo"
                );

                if ($(this).parents(".nav-menu").length) {
                    $(".nav-menu .menu-active").removeClass("menu-active");
                    $(this)
                        .closest("li")
                        .addClass("menu-active");
                }

                if ($("body").hasClass("mobile-nav-active")) {
                    $("body").removeClass("mobile-nav-active");
                    $("#mobile-nav-toggle i").toggleClass("fa-times fa-bars");
                    $("#mobile-body-overly").fadeOut();
                }
                return false;
            }
        }
    });

    // Activate smooth scroll on page load with hash links in the url
    $(document).ready(function() {
        if (window.location.hash) {
            var initial_nav = window.location.hash;
            if ($(initial_nav).length) {
                var scrollto = $(initial_nav).offset().top - scrolltoOffset;
                $("html, body").animate(
                    {
                        scrollTop: scrollto
                    },
                    1500,
                    "easeInOutExpo"
                );
            }
        }
    });

    // Carousel genres (index.blade.php)
    $("#genresCarousel").carousel({
        interval: 3000
    });

    $(".carousel .carousel-item").each(function() {
        var minPerSlide = 8;
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(":first");
        }
        next.children(":first-child")
            .clone()
            .appendTo($(this));

        for (var i = 0; i < minPerSlide; i++) {
            next = next.next();
            if (!next.length) {
                next = $(this).siblings(":first");
            }

            next.children(":first-child")
                .clone()
                .appendTo($(this));
        }
    });

    // Gallery carousel (uses the Owl Carousel library)
    $(".gallery-carousel").owlCarousel({
        autoplay: true,
        dots: true,
        loop: true,
        center: true,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 3
            },
            992: {
                items: 4
            },
            1200: {
                items: 5
            }
        }
    });

    // Buy tickets select the ticket type on click
    $("#buy-ticket-modal").on("show.bs.modal", function(event) {
        var button = $(event.relatedTarget);
        var ticketType = button.data("ticket-type");
        var modal = $(this);
        modal.find("#ticket-type").val(ticketType);
    });

    // Init AOS
    function aos_init() {
        AOS.init({
            duration: 1000,
            once: true
        });
    }
    $(window).on("load", function() {
        aos_init();
    });
})(jQuery);
