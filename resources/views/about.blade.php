@extends( 'layouts.base' )

@section( 'content' )
    <section class="pull" id="about-pull">
        <div class="pull-inner">
            <h2>
                {{ $page->mantle_headline }}
            </h2>

            <p>
                {{ $page->mantle_subheadline }}
            </p>

            @callbutton
            @dropdown
        </div>
    </section>

    <section id="about-copy">
        <h1>
            {{ $page->content_headline }}
        </h1>

        {!! $page->content_text !!}
    </section>

    <section id="about-content">
        <div class="about-content" id="about-personal-service">
            {!! $page->personal_service_text !!}
        </div>

        <div class="about-content" id="about-awards-recognition">
            <h3>
                {{ $page->awards_headline }}
            </h3>

            <div id="about-awards-image">
                <figure>
                    @if( app()->getLocale() == 'en' )
                        <img id="award-image-en" src="/storage/{{ $page->awards_image }}" alt="{{ $page->awards_image_alt }}">
                    @else
                        <img id="award-image-sp" src="/storage/{{ $page->awards_image_sp }}" alt="{{ $page->awards_image_sp }}">
                    @endif

                    <figcaption>
                        {{ $page->awards_image_alt }}
                    </figcaption>
                </figure>
            </div>

            <div id="about-awards-text">
                {!! $page->awards_text !!}
            </div>
        </div>

        <div class="about-content" id="about-community">
            {!! $page->community_text !!}
        </div>
    </section>
@endsection

@push( 'disclaimers' )
    <div class="disclaimers">
        {!! $page->awards_disclaimer !!}
    </div>
@endpush
