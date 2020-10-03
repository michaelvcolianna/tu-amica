<nav class="nav" aria-label="Primary">
    <ul>
        <li class="language">
            @languagebutton
        </li>

        @foreach( $navigation as $link )
            <li class="nav-link">
                <a href="{{ route( app()->getLocale() . '.' . $link->name ) }}" class="{{ ( $route == $link->name ) ? 'current' : '' }}">
                    {{ $link->title }}
                </a>
            </li>
        @endforeach
    </ul>
</nav>
