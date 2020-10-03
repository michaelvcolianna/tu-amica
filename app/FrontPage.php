<?php

namespace App;

use App\Page;

class FrontPage extends Page
{
    protected $translatable = [
        'title',
        'banner_headline',
        'banner_text',
        'mantle_image_alt',
        'mantle_headline',
        'mantle_subheadline',
        'cta_text',
        'callout_image_alt',
        'callout_text',
    ];
}
