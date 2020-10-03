<div id="banner">
    <h3>
        <button aria-expanded="true" class="banner-trigger" aria-controls="banner-message" id="banner-title">
            <span class="banner-title">
                {!! $page->banner_headline !!}

                <span aria-hidden="true" class="banner-icon"></span>
            </span>
        </button>
    </h3>

    <div id="banner-message" role="region" aria-labelledby="banner-title" class="banner-text">
        {!! $page->banner_text !!}
    </div>
</div>
