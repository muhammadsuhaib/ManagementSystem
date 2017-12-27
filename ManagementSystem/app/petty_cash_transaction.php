<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class petty_cash_transaction extends Model
{
    protected $fillable=
        [


        'total_recieved_money',
        'over_amount',
        'total_payment',
        'balance',
            'petty_cash_first_amount',

];

}
