@extends( 'layouts.base' )

@section( 'content' )
    @copyblock
    @ctablock

    @exampleblock( ['example_id' => 'home-savings', 'example_headline' => $page->savings_headline, 'example_text' => $page->savings_text, 'savings_table' => true, 'savings_table_disclaimers' => $page->savings_table_disclaimer, 'example_cta_text' => $page->savings_cta_text, 'accordion_id' => 'home-available-discounts', 'accordion_headline' => $page->available_savings_headline, 'accordion_text' => $page->available_savings_text] )
    @exampleblock( ['example_id' => 'home-coverage-options', 'example_headline' => $page->coverage_headline, 'example_text' => $page->coverage_text, 'example_cta_text' => $page->coverage_cta_text, 'accordion_id' => 'home-more-options', 'accordion_headline' => $page->coverage_options_headline, 'accordion_text' => $page->coverage_options_text] )
@endsection

@push( 'disclaimers' )
    <div class="disclaimers">
        {!! $page->coverage_options_disclaimers !!}
        {!! $page->available_savings_disclaimers !!}
    </div>
@endpush
