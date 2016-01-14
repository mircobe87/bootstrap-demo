(function($) {

    /**
    * initialize the 'black dropdown' panels that are showed
    * when the mouse pointer passes over the post tiles.
    */
    function overlaySetup() {
        // for each dropdown panels ...
        $('.tile-overlay').each(function(index, item) {
            var overlay = $(item);
            // ... get its container element ...
            var tile = overlay.parent().children('.tile');
            // ... get the exact value to place the buttom of the dropdown panel
            // on the top of the respective post tile ...
            var initialTop = '-' + tile.css('height');

            // ... hide the dropdown panel during the setting up ...
            overlay.css('display', 'none');
            // ... set up the style of the dropdown panel to fit the size of its
            // post tile ...
            overlay.css({
                top: initialTop,
                width: tile.css('width'),
                height: tile.css('height')
            });
            // ... make the dropdown panel visible ...
            overlay.css('display', 'block');

            // ... define the mouseenter event handler to show the dropdown panel ...
            function showOverlay() {
                overlay.css('top', 0);
            }
            tile.off('mouseenter').on('mouseenter', showOverlay);

            // ... define the mouseleave event handler to hide the dropdown
            // panel ...
            function hideOverlay() {
                overlay.css('top', initialTop);
            }
            overlay.off('mouseleave').on('mouseleave', hideOverlay);
        })
    }

    // when the page become ready ...
    $(function() {
        // ... all the dropdown panels are set up ...
        overlaySetup();

        // ... a resize event handler is defined to reinitialize all the
        // dropdown panels so that they can cover correctly their post tiles.
        $(window).on('resize', function() {
            overlaySetup();
        });
    });

})(jQuery);
