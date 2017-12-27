<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormBModel extends Model
{
    protected $fillable=[



        'checker_approval_date',
        'checker_signature'

    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
