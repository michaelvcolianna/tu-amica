<nav class="social" aria-label="Social media">
    <em>
        {{ $language->join_us_online }}
    </em>

    <ul>
        @foreach( $social as $link )
            <li>
                <a href="{{ $link->url }}" target="_blank" class="link-{{ $link->icon }}">
                    <i class="icon-{{ $link->icon }}"></i>
                    <em>
                        {{ $link->title }}
                    </em>
                </a>
            </li>
        @endforeach
    </ul>
</nav>
