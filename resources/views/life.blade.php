@extends( 'layouts.base' )

@section( 'content' )
    @copyblock
    @ctablock

    {{-- @note Using the include would introduce too much complexity --}}
    <section class="example" id="life-calculator">
        <div class="example-offset">
            <div class="offset-inner">
                @include( 'partials.calculator.' . app()->getLocale() )
            </div>
        </div>

        <div class="example-inner">
            {!! $page->calculator_text !!}
        </div>

        <div id="life-accordions">
            @accordion( ['id' => 'life-advantages-term', 'headline' => $page->term_headline, 'text' => $page->term_text] )
            @accordion( ['id' => 'life-advantages-whole', 'headline' => $page->whole_headline, 'text' => $page->whole_text] )
        </div>
    </section>
@endsection

@push( 'disclaimers' )
    <div class="disclaimers">
        {!! $page->insurance_disclaimers !!}
    </div>
@endpush
