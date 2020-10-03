<?php

namespace App;

use App\Page;

class AutoPage extends Page
{
    protected $translatable = [
        'title',
        'banner_headline',
        'banner_text',
        'mantle_image_alt',
        'mantle_headline',
        'mantle_text',
        'cta_text',
        'savings_headline',
        'savings_text',
        'savings_table_amount',
        'savings_table_disclaimers',
        'available_savings_header',
        'available_savings_text',
        'available_savings_disclaimers',
        'savings_cta_text',
        'coverage_headline',
        'coverage_text',
        'coverage_options_headline',
        'coverage_options_text',
        'coverage_options_disclaimers',
        'coverage_cta_text',
        'benefits_headline',
        'benefits_text',
        'more_benefits_headline',
        'more_benefits_text',
        'more_benefits_disclaimers',
        'benefits_cta_text',
        'bottom_cta_text',
        'savings_geico',
        'savings_allstate',
        'savings_progressive',
        'savings_farmers',
        'savings_statefarm',
    ];
}
