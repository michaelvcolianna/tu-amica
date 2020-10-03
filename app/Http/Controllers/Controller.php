<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /* @var \TCG\Voyager\Translator */
    protected $page, $languages;

    /* @var \Illuminate\Database\Eloquent\Collection */
    protected $routes, $social;

    /* @var string */
    protected $phd, $phm, $url_auto, $url_home, $url_life;

    /* @var boolean */
    protected $submitted, $error;

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke( Request $request )
    {
        $group = app()->getLocale() . '.';
        $name = $request->route()->getName();
        $route = strtolower( str_replace( $group, '', $name ) );

        $alt = setting( 'site.' . app()->getLocale() . '_switch_alt' );
        $switch = setting( 'site.' . app()->getLocale() . '_switch_text' );

        // All values are in the Voyager admin panel instead of code
        $this->url_auto = setting( 'site.url_auto' );
        $this->url_home = setting( 'site.url_home' );
        $this->url_life = setting( 'site.url_life' );
        $this->url_extra = '';
        $this->form_submitted = false;
        $this->form_error = false;
        $this->show_gtm = false;

        $this->phd = setting( 'site.default_phone' );
        $this->phm = setting( 'site.default_phone' );
        if( $route == 'life' )
        {
            $this->phd = setting( 'site.default_life' );
            $this->phm = setting( 'site.default_life' );
        }

        $this
            ->getPage( $route )
            ->getRoutes()
            ->getSocial()
            ->getLanguages()
            ->getDynamicNumbers( $route )
            ->getLifeUrl()
            ->getFormSubmitStatus()
            ->getFormErrorStatus()
            ->getGtmStatus();

        return view( $route, [
            'page'           => $this->page,
            'navigation'     => $this->routes,
            'social'         => $this->social,
            'language'       => $this->languages,
            'phd'            => $this->phd,
            'phm'            => $this->phm,
            'url_auto'       => $this->url_auto,
            'url_home'       => $this->url_home,
            'url_life'       => $this->url_life,
            'url_extra'      => $this->url_extra,
            'form_submitted' => $this->form_submitted,
            'form_error'     => $this->form_error,
            'show_gtm'       => $this->show_gtm,
            'route'          => $route,
            'switch'         => [
                'route' => $alt . $route,
                'text'  => $switch,
            ],
        ]);
    }

    /**
     * Retrieve the translated page to display
     *
     * @param string $route
     * @return self
     */
    protected function getPage( string $route )
    {
        $model = ucfirst( $route ) . 'Page';
        if( $route == 'frontpage' )
        {
            $model = 'FrontPage';
        }
        $model = 'App\\' . $model;

        $page = $model::where( 'id', 1 )->get()->first();
        $this->page = $page->translate();

        return $this;
    }

    /**
     * Retrieve the list of social links
     *
     * @return self
     */
    protected function getSocial()
    {
        $this->social = \App\SocialLink::all();

        return $this;
    }

    /**
     * Retrieve the list of routes
     *
     * @return self
     */
    protected function getRoutes()
    {
        $routes = \App\Route::all();
        $this->routes = $routes->translate();

        return $this;
    }

    /**
     * Retrieve the list of languages
     *
     * @return self
     */
    protected function getLanguages()
    {
        $languages = \App\Language::where( 'id', 1 )->get()->first();
        $this->languages = $languages->translate();

        return $this;
    }

    /**
     * Dynamic phone numbers
     *
     * @param string $route
     * @return self
     */
    protected function getDynamicNumbers( string $route )
    {
        $phd = 'ahphd';
        $phm = 'ahphm';
        if( $route == 'life' )
        {
            $phd = 'lphd';
            $phm = 'lphm';
        }

        if( request()->filled( $phd ) && $this->isValidPhone( request()->query( $phd ) ) )
        {
            $this->phd = $this->getPrettyPhone( request()->query( $phd ) );
        }

        if( request()->filled( $phm ) && $this->isValidPhone( request()->query( $phm ) ) )
        {
            $this->phm = $this->getPrettyPhone( request()->query( $phm ) );
        }

        return $this;
    }

    /**
     * Updates life quote engine URL
     *
     * @return self
     */
    protected function getLifeUrl()
    {
        $url = [
            'isc' => null,
            'lphd' => $this->getRawNumber( setting( 'site.default_life' ) ),
            'lphm' => $this->getRawNumber( setting( 'site.default_life' ) ),
        ];

        // @note ISC logic still not determined by client, but _will_ live here

        if( request()->filled( 'lphd' ) && $this->isValidPhone( request()->query( 'lphd' ) ) )
        {
            $url['lphd'] = $this->getRawNumber( request()->query( 'lphd' ) );
        }

        if( request()->filled( 'lphm' ) && $this->isValidPhone( request()->query( 'lphm' ) ) )
        {
            $url['lphm'] = $this->getRawNumber( request()->query( 'lphm' ) );
        }

        $this->url_extra = '?' . http_build_query( $url );

        return $this;
    }

    /**
     * Updates form submit status
     *
     * @return self
     */
    protected function getFormSubmitStatus()
    {
        if
        (
            (
                request()->session()->has( 'form' )
                &&
                request()->session()->get( 'form' ) == 'submitted'
            )
            ||
            (
                env( 'APP_ENV' ) != 'production'
                &&
                request()->has( 'submitted' )
            )
        )
        {
            $this->form_submitted = true;
        }

        return $this;
    }

    /**
     * Updates form error status
     *
     * @return self
     */
    protected function getFormErrorStatus()
    {
        if
        (
            (
                request()->session()->has( 'form' )
                &&
                request()->session()->get( 'form' ) == 'error'
            )
            ||
            (
                env( 'APP_ENV' ) != 'production'
                &&
                request()->has( 'error' )
            )
        )
        {
            $this->form_error = true;
        }

        return $this;
    }

    /**
     * Updates display of GTM
     *
     * @return self
     */
    protected function getGtmStatus()
    {
        if
        (
            env( 'APP_ENV' ) != 'local'
            &&
            !request()->has( 'nogtm' )
        )
        {
            $this->show_gtm = true;
        }

        return $this;
    }

    /**
     * Raw phone number
     *
     * @param  string  $phone
     * @return string
     */
    protected function getRawNumber( $phone = '' )
    {
        return preg_replace( '/[^0-9]/', '', $phone );
    }

    /**
     * Pretty phone number
     *
     * @param  string  $phone phone number to format
     * @param  boolean  $alt
     * @return string
     */
    protected function getPrettyPhone( $phone = '', $alt = false )
    {
        $format = '%s-%s-%s';
        if ( $alt )
        {
            $format = '(%s) %s-%s';
        }

        $raw_number = $this->getRawNumber( $phone );

        // This method is more readable than PCRE (and, somehow, faster)
        $pieces = [
            substr( $raw_number, -10, 3 ),
            substr( $raw_number, -7, 3 ),
            substr( $raw_number, -4 ),
        ];

        return sprintf( $format, ...$pieces );
    }

    /**
     * Loose phone number validity
     *
     * @param  string  $phone
     * @return  boolean
     */
    protected function isValidPhone( $phone = '' )
    {
        return ( strlen( $this->getRawNumber( $phone ) ) == 10 );
    }
}
