@extends( 'layouts.base' )

@section( 'banner' )
    @banner
@endsection

@section( 'content' )
    @copyblock
    @ctablock

    @exampleblock( ['example_id' => 'auto-savings', 'example_headline' => $page->savings_headline, 'example_text' => $page->savings_text, 'savings_table' => true, 'savings_table_disclaimers' => $page->savings_table_disclaimers, 'example_cta_text' => $page->savings_cta_text, 'accordion_id' => 'auto-available-discounts', 'accordion_headline' => $page->available_savings_header, 'accordion_text' => $page->available_savings_text] )
    @exampleblock( ['example_id' => 'auto-coverage-options', 'example_headline' => $page->coverage_headline, 'example_text' => $page->coverage_text, 'example_cta_text' => $page->coverage_cta_text, 'accordion_id' => 'auto-more-options', 'accordion_headline' => $page->coverage_options_headline, 'accordion_text' => $page->coverage_options_text] )
    @exampleblock( ['example_id' => 'auto-benefits', 'example_headline' => $page->benefits_headline, 'example_text' => $page->benefits_text, 'example_cta_text' => $page->benefits_cta_text, 'accordion_id' => 'auto-more-benefits', 'accordion_headline' => $page->more_benefits_headline, 'accordion_text' => $page->more_benefits_text] )

    <div id="auto-bottom">
        @callout( ['text' => $page->bottom_cta_text] )
    </div>
@endsection

@push( 'disclaimers' )
    <div class="disclaimers">
        {!! $page->available_savings_disclaimers !!}
        {!! $page->coverage_options_disclaimers !!}
        {!! $page->more_benefits_disclaimers !!}
    </div>
@endpush
