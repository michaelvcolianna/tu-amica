<div class="mantle">
    {{-- BEGIN design quirk --}}
    <div class="desktop-mantle" style="background-image: url('/storage/{{ $page->mantle_image_lg }}');"></div>
    {{-- END design quirk --}}

    <figure>
        <picture>
            <source srcset="/storage/{{ $page->mantle_image_sm }}" media="(max-width: 767px)">
            <source srcset="/storage/{{ $page->mantle_image_md }}" media="(max-width: 1023px)">
            <img src="/storage/{{ $page->mantle_image_lg }}" alt="{{ $page->mantle_image_alt }}">
        </picture>

        <figcaption>
            {{ $page->mantle_image_alt }}
        </figcaption>
    </figure>
</div>
