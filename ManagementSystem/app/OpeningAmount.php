<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpeningAmount extends Model
{
    protected $fillable = [

        'date',
        'user_id',
        'opening_amount',

    ];
}
