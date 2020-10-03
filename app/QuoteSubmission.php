<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuoteSubmission extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'phone',
        'early',
        'late',
        'timezone',
        'email',
        'coverage',
    ];
}
