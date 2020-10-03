<section class="cta" id="{{ $route ?? 'generic' }}-cta">
    <div class="cta-inner">
        {!! $page->cta_text !!}

        @callbutton

        @dropdown
    </div>
</section>
