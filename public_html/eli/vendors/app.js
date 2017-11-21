$(document).ready(function() {
    $('.toggle-nav').click(function(e) {
        $(this).toggleClass('active');
        $('nav.menu ul').slideToggle();
        $('.select-lang').slideToggle().css('display', 'block');
        e.preventDefault();
    });

    $("button.btn").click(function() {
        $(".select-lang ul").slideToggle();
    });
    $("button.choose").click(function() {
        if ($(this).text() == "Choissez") {
            $(this).text("Choisir");
        } else {
            $(this).text("Choissez");
        };
    });
    $("button.choose").click(function() {
        $(".choose-car").css({ "background-color": "gray", "color": "white" });
    });


    $('.accordion-section-title').click(function(e) {
        if ($(e.target).is('.active')) {
            $('.accordion .accordion-section-title').removeClass('active');
            $('.accordion .accordion-section-content.open').slideUp(300).removeClass('open');
        } else {
            // Add active class to section title
            $(this).addClass('active');
            // Open up the hidden content panel
            $(this).next().slideDown(300).addClass('open');
        }
        $.scrollify.update();
    });

    if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        $.scrollify({
            section: "section",
            sectionName: false,
            interstitialSection: ".header, .footer"
        });

    }



    // $.scrollify({
    //     section: "section",
    //     sectionName: false,
    //     interstitialSection: "header",
    //     before: function(i, sections) {
    //         var offset = 0;
    //         if (i < 6) {
    //             offset = -141;
    //         } else {
    //             offset = -260;
    //         }
    //         if (i < 2) {
    //             $("header").css({ "background": "rgba(0,0,0,0.55)" });
    //         } else {
    //             $("header").css({ "background": "#333" });
    //         }
    //         console.log(offset);
    //         console.log(i);
    //         $.scrollify.setOptions({ offset: offset })
    //     }
    // });
});