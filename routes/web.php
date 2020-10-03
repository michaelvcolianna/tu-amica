<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Voyager's routes for administration (no changes on QA/PROD boxes)
if( env( 'APP_ENV' ) == 'local' )
{
    Route::group( ['prefix' => 'admin'], function () {
        App::setLocale('en');
        Voyager::routes();
    });
}

// URLs para sitio en español
Route::name( 'sp.' )->prefix( 'sp' )->middleware( 'locale' )->group( function() {
    Route::get( 'inicio', 'Controller' )->name( 'frontpage' );
    Route::get( 'historia', 'Controller' )->name( 'about' );
    Route::get( 'productos/autos', 'Controller' )->name( 'auto' );
    Route::get( 'productos/hogar', 'Controller' )->name( 'home' );
    Route::get( 'productos/vida', 'Controller' )->name( 'life' );
    Route::get( 'cotizacion', 'Controller' )->name( 'quote' );
});

// URLs for English site
Route::name( 'en.' )->prefix( 'en' )->middleware( 'locale' )->group( function() {
    Route::get( 'home', 'Controller' )->name( 'frontpage' );
    Route::get( 'amica-story', 'Controller' )->name( 'about' );
    Route::get( 'products/auto', 'Controller' )->name( 'auto' );
    Route::get( 'products/home', 'Controller' )->name( 'home' );
    Route::get( 'products/life', 'Controller' )->name( 'life' );
    Route::get( 'get-a-quote', 'Controller' )->name( 'quote' );
});

// Form submission
Route::post( 'submit-quote', 'QuoteController' )->name( 'submit' );

// Log viewer (not on PROD boxes)
if( env( 'APP_ENV' ) != 'production' )
{
    Route::get( 'croninlogs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index' );
}

// Redirect to front page for invalid URLs
Route::fallback( function() {
    $locale = 'sp';

    $language = substr( request()->getPreferredLanguage(), 0, 2 );
    if( in_array( $language, config( 'app.locales' ) ) )
    {
        $locale = $language;
    }

    return redirect()->route( $locale . '.frontpage' );
});
