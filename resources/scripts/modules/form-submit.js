// modules/form-submit.js
// Form submit custom module

// Global variables
const
    SUBMITTED_FLAG = 'form-submitted',
    ERROR_FLAG = 'form-error'
    ;

// Elements the module will access
let
    el_html = document.querySelector( 'html' ),
    el_meta = document.querySelector( 'meta#analytics-presence' ),
    el_form = document.querySelector( '#quote-form form' ),
    el_csrf = document.querySelector( 'input[name="_token"]' ),
    el_firstname = document.querySelector( '#firstname' ),
    el_lastname = document.querySelector( '#lastname' ),
    el_phone = document.querySelector( '#phone' ),
    el_early = document.querySelector( '#early' ),
    el_late = document.querySelector( '#late' ),
    el_timezone = document.querySelector( '#timezone' ),
    el_email = document.querySelector( '#email' ),
    el_coverage = document.querySelector( '#coverage' )
    ;

/**
 * Checks form existence and validation capability
 *
 * @return  boolean
 */
function checkForm( el_form )
{
    if( el_form && el_form.getAttribute( 'novalidate' ) === null && typeof document.createElement( 'input' ).checkValidity == 'function' )
    {
        return true;
    }

    return false;
}

module.exports = {
    init( axios ) {
        /*
            Only adds the listener when the form is present, the browser has
            native validation, and the form doesn't have the 'novalidate'
            attribute.

            This way, Laravel handles the validation with translation if a user
            is on a non-supported browser.
        */
        if( checkForm( el_form ) )
        {
            el_form.addEventListener( 'submit', function(e) {
                e.preventDefault();

                var form_data = new FormData();
                form_data.append( '_token', el_csrf.value );
                form_data.append( 'firstname', el_firstname.value );
                form_data.append( 'lastname', el_lastname.value );
                form_data.append( 'phone', el_phone.value );
                form_data.append( 'early', el_early.value );
                form_data.append( 'late', el_late.value );
                form_data.append( 'timezone', el_timezone.value );
                form_data.append( 'email', el_email.value );
                form_data.append( 'coverage', el_coverage.value );

                axios({
                    method: 'post',
                    url: el_form.action + '?ajax',
                    data: form_data,
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-CSRF-TOKEN': form_data.get( '_token' )
                    }
                })
                .then( function() {
                    el_html.classList.add( SUBMITTED_FLAG );

                    if( el_meta )
                    {
                        window.dataLayer = window.dataLayer || [];

                        window.dataLayer.push({
                            "event": 'amica-tuamica',
                            "event_category": 'formSubmit',
                            "event_action": 'completed',
                            "event_label": el_html.getAttribute( 'lang' )
                        });
                    }
                })
                .catch( function() {
                    el_html.classList.add( ERROR_FLAG );
                })
                .finally( function() {
                    el_form.reset();
                });
            } );
        }

        return;
    }
};
