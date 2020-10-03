<div class="dropdown">
    <button type="button" id="{{ $id ?? 'genericDropdown' }}" aria-haspopup="true" aria-expanded="false">
        @isset( $mantle )
            {{ $language->get_started }}
        @else
            {{ $language->get_quote }}
        @endisset

        <i class="icon-caret"></i>
    </button>

    <div class="dropdown-menu" aria-labelledby="{{ $id ?? 'genericDropdown' }}">
        <ul>
            @isset( $mantle )
                @include( 'links.mantle' )
            @else
                @include( 'links.default' )
            @endisset
        </ul>
    </div>

    @if( app()->getLocale() == 'sp' && !isset( $mantle ) )
        <p>
            (en inglés solamente)
        </p>
    @endif
</div>
