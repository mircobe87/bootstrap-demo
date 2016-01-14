(function($) {

// ==== OverlayManager =========================================================

    function OverlayManager() {
        this.list = [];
    };

    /**
     * open the passed overlay
     */
    OverlayManager.prototype.open = function(overlay) {
        var tile = overlay.parent().children('.tile');
        var initialTop = '-' + tile.css('height');
        overlay.css('top', 0);
        this.list.push({
            overlay: overlay,
            close: function() {
                overlay.css('top', initialTop);
            }
        });
    };

    /**
     * it searches for the passed overlay in ordet to close it.
     */
    OverlayManager.prototype.close = function(overlay) {
        var i = 0;
        while (i < this.list.length && this.list[i].overlay != overlay) i++;
        if (i < this.list.length) {
            this.list[i].close();
            this.list.splice(i, 1);
        }
    };

    /**
     * close all opened overlays
     */
    OverlayManager.prototype.closeAll = function() {
        while(this.list.length > 0) {
            this.list.pop().close();
        }
    };

    /**
    * initialize the 'black dropdown' panels that are showed
    * when the mouse pointer passes over the post tiles.
    */
    OverlayManager.prototype.init = function() {
        var scope = this;
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

            // ... define the mouseenter event handler to show the dropdown
            // panel ...
            function showOverlay(event) {
                scope.closeAll(); // close overlays that are still open
                scope.open(overlay); // open the current overlay
            }
            tile.off('mouseenter').on('mouseenter', showOverlay);

            // ... define the mouseleave event handler to hide the dropdown
            // panel ...
            function hideOverlay(event) {
                scope.close(overlay);
            }
            overlay.off('mouseleave').on('mouseleave', hideOverlay);
        });
    };

    OverlayManager.prototype.refresh = function() {
        this.closeAll();
        this.init();
    };
// =============================================================================

// ---- MAIN -------------------------------------------------------------------
    var olManager = new OverlayManager();
    // when the page become ready ...
    $(function() {
        // ... all the dropdown panels are set up ...
        olManager.init();

        // ... a resize event handler is defined to reinitialize all the
        // dropdown panels so that they can cover correctly their post tiles.
        $(window).on('resize', function() {
            olManager.refresh();
        });
    });
// -----------------------------------------------------------------------------

})(jQuery);
