jQuery(document).ready(function ($) {

    blockNegativeMargin = $('.elodin-section.negative-margin-top');

    function triggerNegativeMargin(e) {
        blockNegativeMargin.each(repositionNegativeMargin);
    }

    function repositionNegativeMargin() {

        var element = $(this);
        negativeMargin = element.css('margin-top');
        positiveMargin = parseFloat(negativeMargin) * -1;

        //* if the structure is like this:
        //  .elodin-section
        //  .elodin-section
        //       > .elodin-section.negative-margin

        var uncle = element.parents('.elodin-section').prev();
        var cousin = uncle.children('.section-content');

        if (cousin) {
            cousin.css('margin-bottom', positiveMargin);
        }

        //* if the structure is like this:
        // .elodin-section
        // .elodin-section.negative-margin

        var prev = element.prev();
        var prevChildren = prev.children('.section-content');
        prevChildren.css('margin-bottom', positiveMargin);

    }

    $(window).on('load resize', triggerNegativeMargin);

});