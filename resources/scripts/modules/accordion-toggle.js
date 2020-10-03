// modules/accordion-toggle.js
// Accordion collapse custom module

// Global variables
const
    COLLAPSED_FLAG  = 'accordion-collapsed'
    ;

// Elements the module will access
let
    el_html = document.querySelector( 'html' )
    ;

/**
 * Accordion opener
 *
 * Adds the flag class to the given accordion element.
 *
 * @param HTMLElement el_accordion
 */
function open_accordion( el_accordion )
{
    el_accordion.classList.remove( COLLAPSED_FLAG );
}

/**
 * Accordion closer
 *
 * Removes the flag class from the given dropdown element.
 *
 * @param HTMLElement el_accordion
 */
function close_accordion( el_accordion )
{
    el_accordion.classList.add( COLLAPSED_FLAG );
}

/**
 * Accordion activation
 *
 * Click event handler for button elements. Finds the dropdown the button is a
 * part of and determines whether to open or close anything.
 *
 * @param HTMLElement el_button
 */
function accordion_click( el_button )
{
    if( el_button.parentElement.classList.contains( COLLAPSED_FLAG ) )
    {
        // Opening an accordion by clicking its button.
        open_accordion( el_button.parentElement );
    }
    else
    {
        // Closing an accordion by clicking its button.
        close_accordion( el_button.parentElement );
    }
}

/**
 * Event checker
 *
 * Sees what event occurred and acts accordingly.
 *
 * @param Event event
 */
function check_event( event )
{
    if( event.target.tagName.toUpperCase() == 'BUTTON' )
    {
        // A button was clicked. Determine the course of action.
        accordion_click( event.target );
    }
    else if( event.target.tagName.toUpperCase() == 'I' )
    {
        accordion_click( event.target.parentElement );
    }
}

module.exports = {
    init() {
        el_html.addEventListener( 'click', check_event, false );

        return;
    }
};