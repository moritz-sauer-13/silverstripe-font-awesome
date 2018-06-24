(function($) {
    $.entwine(function($) {

        /**
         * Class: .icp-auto
         *
         * Load the icon picker
         */
        $('.icp-auto').entwine({
            onmatch: function() {
                $('.icp-auto').iconpicker({
                    animation: false,
                    collision: true,
                    hideOnSelect: false,
                    placement: 'inline'
                });

                // prevent redirect
                $('.iconpicker-popover .iconpicker-item').click(function(e) {
                    e.preventDefault()
                });
            }
        });
    });
})(jQuery);
