<?php

namespace App;

use App\Branch;
use Illuminate\Database\Eloquent\Model;

class PettyCashSystem extends Model
{
    protected $fillable = [

//        'request_date',
        'branch_id',
        'purchasing_date',
//        'over_amount',
//        'total_payment',
//        'balance',
        'type',
        'subject',
        'amount',
        'department',
        'note',

    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
}
