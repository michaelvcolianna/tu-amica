<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Language extends Model
{
    use Translatable;

    protected $translatable = [
        'toggle_navigation',
        'switch_language',
        'call_us_now',
        'join_us_online',
        'get_started',
        'get_quote',
        'link_auto',
        'link_home',
        'link_life',
        'switching_from',
        'average_savings',
        'footer_text',
    ];
}
