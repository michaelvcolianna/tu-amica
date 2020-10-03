<li>
    <a href="{{ route( app()->getLocale() . '.auto' ) }}" class="dropdown-item auto">
        <i class="icon-car"></i>

        <span class="cta-option-text">{{ $language->link_auto }}</span>
        <span aria-hidden="true" data-icon="►"></span>
    </a>
</li>

<li>
    <a href="{{ route( app()->getLocale() . '.home' ) }}" class="dropdown-item home">
        <i class="icon-house"></i>

        <span class="cta-option-text">{{ $language->link_home }}</span>
        <span aria-hidden="true" data-icon="►"></span>
    </a>
</li>

<li>
    <a href="{{ route( app()->getLocale() . '.life' ) }}" class="dropdown-item life">
        <i class="icon-family"></i>

        <span class="cta-option-text">{{ $language->link_life }}</span>
        <span aria-hidden="true" data-icon="►"></span>
    </a>
</li>
