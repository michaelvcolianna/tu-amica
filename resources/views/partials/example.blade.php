<section class="example" id="{{ $example_id ?? 'generic-example' }}">
    <div class="example-inner">
        <h2>
            {{ $example_headline }}
        </h2>

        {!! $example_text !!}
    </div>

    @if( isset( $savings_table ) )
        <div class="savings-table">
            @savingstable

            {!! $savings_table_disclaimers !!}
        </div>
    @endif

    @accordion( ['id' => $accordion_id, 'headline' => $accordion_headline, 'text' => $accordion_text] )

    @callout( ['text' => $example_cta_text] )
</section>
