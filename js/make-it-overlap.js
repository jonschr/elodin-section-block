jQuery(document).ready(function ($) {

    block = $('.elodin-section.overlap-evenly');

    function thetrigger(e) {
        if ($(window).width() > 560) {
            block.each(reposition);
        } else {
            block.each(reset);
        }
    }

    function reset() {
        var element = $(this);

        element.css('position', 'static');
        element.css( 'transform', 'none' );
        element.css( 'margin-bottom', '0' );

        var prev = element.prev();

        if (prev.hasClass('elodin-section')) {
            prev.children('.section-content').css('margin-bottom', '0');
        } else {
            prev.css('margin-bottom', '0' );
        }

        var next = element.next();

        if (next.hasClass('elodin-section')) {
            next.css( 'margin-top', '0' );
            next.children('.section-content').css('margin-top', '0');
        } else {
            next.css('margin-top', '0');
        }

    }

    function reposition() {

        // define the element we're looking at
        var element = $(this);

        // apply some base styles
        element.css('position', 'relative');
        element.css('z-index', '20');

        // figure out how far we need to shift things
        var height = element.outerHeight();
        var negativeheight = height * -1;
        var negativeshift = height / 2 * -1;
        var shift = height / 2;
        
        // apply the negativeshift to the main element
        element.css( 'transform', 'translateY(-50%)' );
        element.css( 'margin-bottom', negativeshift + 'px' );

        var prev = element.prev();

        if (prev.hasClass('elodin-section')) {
            prev.children('.section-content').css('margin-bottom', shift + 'px');
        } else {
            prev.css('margin-bottom', shift + 'px');
        }

        var next = element.next();

        if (next.hasClass('elodin-section')) {
            next.css( 'margin-top', negativeheight + 'px' );
            next.children('.section-content').css('margin-top', shift + 'px');
        } else {
            next.css('margin-top', negativeheight + 'px');
        }
    }

    $(window).on('load resize', thetrigger);

});