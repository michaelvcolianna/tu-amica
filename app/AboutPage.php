<?php

namespace App;

use App\Page;

class AboutPage extends Page
{
    protected $translatable = [
        'title',
        'mantle_image_alt',
        'mantle_headline',
        'mantle_subheadline',
        'content_headline',
        'content_text',
        'personal_service_headline',
        'personal_service_text',
        'awards_headline',
        'awards_image_alt',
        'awards_text',
        'awards_disclaimer',
        'community_headline',
        'community_text',
    ];
}
