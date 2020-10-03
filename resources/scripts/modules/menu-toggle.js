// modules/menu.js
// Menu toggle custom module

// Global variables
const
    MENU_FLAG = 'menu-open'
    ;

// Elements the module will access
let
    el_html = document.querySelector( 'html' )
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
    if( event.target.classList.contains( 'menu-toggle' ) )
    {
        el_html.classList.toggle( MENU_FLAG );
    }
}

module.exports = {
    init() {
        el_html.addEventListener( 'click', check_event, false );

        return;
    }
};
