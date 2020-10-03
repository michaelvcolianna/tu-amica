@extends( 'layouts.base' )

@section( 'banner' )
    @banner
@endsection

@section( 'content' )
    <section class="pull" id="frontpage-pull">
        <div class="pull-inner">
            <h1>
                {{ $page->mantle_headline }}
            </h1>

            <p>
                {{ $page->mantle_subheadline }}
            </p>

            @dropdown(['id' => 'mantle-menu', 'mantle' => true] )
        </div>
    </section>

    <section id="frontpage-copy">
        {!! $page->cta_text !!}

        @callbutton

        @dropdown(['id' => 'quote-menu'])
    </section>

    <section id="photo-unit">
        <div id="photo-unit-image">
            <figure>
                <picture>
                    <source srcset="/storage/{{ $page->callout_image_sm }}" media="(max-width: 768px)">
                    <source srcset="/storage/{{ $page->callout_image_md }}" media="(max-width: 1024px)">
                    <img src="/storage/{{ $page->callout_image_lg }}" alt="{{ $page->callout_image_alt }}">
                </picture>

                <figcaption>
                    {{ $page->callout_image_alt }}
                </figcaption>
            </figure>
        </div>

        <div id="photo-unit-text">
            {!! $page->callout_text !!}
        </div>
    </section>
@endsection
