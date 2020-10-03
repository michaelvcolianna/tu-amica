<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Handles funky load balancer stuff
        if( env( 'APP_ENV' ) == 'production' )
        {
            \Illuminate\Support\Facades\URL::forceScheme( 'https' );
        }

        Blade::include( 'buttons.call', 'callbutton' );
        Blade::include( 'buttons.dropdown', 'dropdown' );
        Blade::include( 'buttons.header', 'headerbutton' );

        Blade::include( 'navigation.primary', 'mainmenu' );
        Blade::include( 'navigation.social', 'socialmenu' );

        Blade::include( 'partials.accordion', 'accordion' );
        Blade::include( 'partials.banner', 'banner' );
        // No alias for the calculator
        Blade::include( 'partials.callout', 'callout' );
        Blade::include( 'partials.copy', 'copyblock' );
        Blade::include( 'partials.coremetrics', 'coremetrics' );
        Blade::include( 'partials.cta', 'ctablock' );
        Blade::include( 'partials.example', 'exampleblock' );
        Blade::include( 'partials.gtm', 'gtmcode' );
        Blade::include( 'partials.language', 'languagebutton' );
        Blade::include( 'partials.mantle', 'mantle' );
        Blade::include( 'partials.table', 'savingstable' );
        Blade::include( 'partials.times', 'timeoptions' );

        // No alias for the savings table
    }
}
