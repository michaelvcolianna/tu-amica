<?php

namespace App\Http\Middleware;

use Closure;

class CheckLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if( $request->method() === 'GET' )
        {
            $segment = $request->segment( 1 );
            if( $segment == 'admin' )
            {
                $segment = 'en';
            }

            if( !in_array( $segment, config( 'app.locales' ) ) )
            {
                return redirect()->route( 'sp.frontpage' );
            }

            session( ['locale' => $segment] );
            app()->setLocale( $segment );
        }

        return $next($request);
    }
}
