<?php

namespace App;

use App\Page;

class LifePage extends Page
{
    protected $translatable = [
        'title',
        'mantle_image_alt',
        'mantle_headline',
        'mantle_text',
        'cta_text',
        'calculator_headline',
        'calculator_text',
        'term_headline',
        'term_text',
        'whole_headline',
        'whole_text',
        'insurance_disclaimers',
    ];
}
