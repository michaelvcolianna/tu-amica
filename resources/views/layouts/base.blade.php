<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $page->title }}</title>
        <link rel="stylesheet" href="{{ asset( 'assets/main.build.css' ) }}">
        @if( $show_gtm )
            <meta id="analytics-presence">
            <!-- jQuery solely for GTM Scripts -->
            <script
                src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
                integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
                crossorigin="anonymous"></script>

            @gtmcode( ['co' => 'Cronin', 'gtm' => 'GTM-K8JS2D'] )
            @gtmcode( ['co' => 'DEX', 'gtm' => 'GTM-WX24WS'] )

            @coremetrics
        @endif
    </head>

    <body id="page-{{ $route }}" class="{{ $form_submitted ? 'form-submitted' : '' }} {{ $form_error ? 'form-error' : '' }} @hasSection( 'banner' ) has-banner @endif">
        @yield( 'banner' )

        <header>
            <div id="menu-toggle">
                <button type="button" aria-controls="header-menu" aria-expanded="false" aria-label="Toggle navigation" class="menu-toggle">
                    <span class="menu-toggle">
                        <span class="menu-toggle">
                            <em>
                                {{ $language->toggle_navigation }}
                            </em>
                        </span>
                    </span>
                </button>
            </div>

            <div id="logo">
                <a href="{{ route( app()->getLocale() . '.frontpage' ) }}" class="logo">
                    <figure>
                        @include( 'svg.logo' )

                        <figcaption>
                            Amica: Auto Home Life
                        </figcaption>
                    </figure>
                </a>
            </div>

            <div id="header-menu">
                @mainmenu

                <div id="call-button">
                    @headerbutton
                </div>
            </div>

            <div id="header-call">
                @headerbutton
            </div>

            <div id="header-language">
                @languagebutton
            </div>
        </header>

        <main>
            @mantle

            @hasSection( 'content' )
                @yield( 'content' )
            @else
                <p>
                    <em>This template is incomplete for some reason.</em>
                </p>
            @endif
        </main>

        <footer>
            {{--
                @note
                This antipattern is due to a non-minor design change made during
                QA, and not being given enough time to properly address.
            --}}
            @stack( 'disclaimers' )

            @if( app()->getLocale() == 'en' )
                @socialmenu
            @endif

            {!! $language->footer_text !!}
        </footer>

        <script defer src="{{ asset( 'assets/main.build.js' ) }}"></script>
    </body>
</html>
