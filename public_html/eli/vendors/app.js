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
    });

    $.scrollify({
        section: "section",
        sectionName: false,
        interstitialSection: "header,footer",
        before: function(i, sections) {
            if (i < 2) {
                $("header").css({ "background": "rgba(0,0,0,0.55)" });
            } else {
                $("header").css({ "background": "#333" });
                $.scrollify.setOptions({ offset: -141 })
            }
        }
    });
});