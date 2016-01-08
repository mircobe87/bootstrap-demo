(function($) {
    function overlaySetup() {
        $('.tile-overlay').each(function(index, item) {
            var overlay = $(item);
            var tile = overlay.parent().children('.tile');
            var initialTop = '-' + tile.css('height');
            overlay.css({
                top: initialTop,
                width: tile.css('width'),
                height: tile.css('height')
            });
            tile.on('mouseenter', function() {
                overlay.css('top', 0);
            });
            tile.on('mouseleave', function() {
                overlay.css('top', initialTop);
            });
        })
    }
    $(function() {
        overlaySetup();
        $(window).on('resize', function() {
            overlaySetup();
        });
    });
})(jQuery);
