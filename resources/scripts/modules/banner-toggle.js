// modules/banner-toggle.js
// Banner toggle custom module

// Global variables
const
    BANNER_FLAG = 'banner-expanded'
    ;

// Elements the module will access
let
    el_html = document.querySelector( 'html' ),
    has_classes = ['banner-trigger', 'banner-title', 'banner-icon']
    ;

/**
 * Event checker
 *
 * Sees what event occurred and acts accordingly.
 *
 * @param Event event
 */
function check_event( event )
{
    if( [...event.target.classList].some( className => has_classes.indexOf( className ) !== -1 ) )
    {
        el_html.classList.toggle( BANNER_FLAG );
    }
}

module.exports = {
    init() {
        el_html.addEventListener( 'click', check_event, false );

        return;
    }
};
