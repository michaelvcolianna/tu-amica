<?php

namespace App;

use App\Page;

class HomePage extends Page
{
    protected $translatable = [
        'title',
        'mantle_image_alt',
        'mantle_headline',
        'mantle_text',
        'cta_text',
        'coverage_headline',
        'coverage_text',
        'coverage_options_headline',
        'coverage_options_text',
        'coverage_cta_text',
        'savings_headline',
        'savings_text',
        'savings_table_amount',
        'savings_table_disclaimer',
        'available_savings_headline',
        'available_savings_text',
        'available_savings_disclaimers',
        'savings_cta_text',
        'savings_allstate',
        'savings_statefarm',
        'savings_geico',
        'savings_libertymutual',
    ];
}
