// modules/dropdown-toggle.js
// Dropdown buttons custom module

// Global variables
const
    DROPDOWN_FLAG  = 'dropdown-open'
    ;

// Elements the module will access
let
    el_html = document.querySelector( 'html' )
    ;

/**
 * Dropdown opener
 *
 * Adds the flag class to the given dropdown element.
 *
 * @param HTMLElement el_dropdown
 */
function open_dropdown( el_dropdown )
{
    el_dropdown.classList.add( DROPDOWN_FLAG );
}

/**
 * Dropdown closer
 *
 * Removes the flag class from the given dropdown element.
 *
 * @param HTMLElement el_dropdown
 */
function close_dropdown( el_dropdown )
{
    el_dropdown.classList.remove( DROPDOWN_FLAG );
}

/**
 * Dropdown activation
 *
 * Click event handler for button elements. Finds the dropdown the button is a
 * part of and determines whether to open or close anything.
 *
 * @param HTMLElement el_button
 */
function dropdown_click( el_button )
{
    if( el_button.parentElement.classList.contains( DROPDOWN_FLAG ) )
    {
        // Closing an already open dropdown by clicking its button.
        close_dropdown( el_button.parentElement );
    }
    else
    {
        // Opening a dropdown by clicking its button.
        dropdown_clear();
        open_dropdown( el_button.parentElement );
    }
}

/**
 * Global dropdown closer
 *
 * Will close an open dropdown without needing a button.
 */
function dropdown_clear()
{
    // Find the open dropdown to close.
    let el_open = document.querySelector( '.dropdown.' + DROPDOWN_FLAG );

    if( el_open )
    {
        close_dropdown( el_open );
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
        dropdown_click( event.target );
    }
    else if( event.target.tagName.toUpperCase() == 'I' )
    {
        dropdown_click( event.target.parentElement );
    }
    else
    {
        // Something else was clicked. Close any open dropdown.
        dropdown_clear();
    }
}

module.exports = {
    init() {
        el_html.addEventListener( 'click', check_event, false );

        return;
    }
};