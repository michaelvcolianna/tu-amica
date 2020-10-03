<li>
    <a href="{{ $url_auto }}" class="dropdown-item auto" target="_blank">
        <i class="icon-car"></i>

        <span class="cta-option-text">{{ $language->link_auto }}</span>
        <span aria-hidden="true" data-icon="►"></span>
    </a>
</li>

<li>
    <a href="{{ $url_home }}" class="dropdown-item home" target="_blank">
        <i class="icon-house"></i>

        <span class="cta-option-text">{{ $language->link_home }}</span>
        <span aria-hidden="true" data-icon="►"></span>
    </a>
</li>

<li>
    <a href="{{ $url_life }}{{ $url_extra }}" class="dropdown-item life" target="_blank">
        <i class="icon-family"></i>

        <span class="cta-option-text">{{ $language->link_life }}</span>
        <span aria-hidden="true" data-icon="►"></span>
    </a>
</li>
