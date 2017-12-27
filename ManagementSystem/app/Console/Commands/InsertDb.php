<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Bumon;
use App\Type;
use Sentinel;
use App\Branch;
use App\Http\Controllers;
use App\PettyCashSystem;
use App\OpeningAmount;
use App\PettyCashTransaction;
use Illuminate\Http\Request;


class InsertDb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:db';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert Database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {

        $time = Carbon::now()->endOfDay('Asia/Tokyo');
        $next = Carbon::now()->endOfMonth('Asia/Tokyo');

        $testing = DB::table('opening_amounts')
            ->where('user_id',11)
            ->get()->count();


//        echo '<pre>';print_r($opening_amount1);echo '</pre>';die();

        if ($time == $next)

        {
            if($testing > 1)
            {

                $check_previous_data = DB::table('petty_cash_transactions')->where('branch_id', 1)
                    ->get()->last();

              $totalpayment = PettyCashSystem::where('branch_id', 1)
              ->where('accountant', '1')
              ->where('checker', '1')
              ->where('created_at', 'like', '%' . date("Y-m") . '%')
              ->sum('amount');

                $opening_amount = $check_previous_data->carry_over_amount +  $check_previous_data->deficiency_amount;

                $balance = $opening_amount - $totalpayment;
                $deficiency_amount = $totalpayment;
                $carry_over_amount = $balance;



            DB::table('petty_cash_transactions')->insert(['balance' => $balance,
                'carry_over_amount' => $carry_over_amount,
                'total_payment' => $totalpayment,
                'deficiency_amount' => $deficiency_amount,
                'branch_id' => 1,
            ]);


            }

            else

            {

                $totalpayment = PettyCashSystem::where('branch_id', 1)
                    ->where('accountant', '1')
                    ->where('checker', '1')
                    ->where('created_at', 'like', '%' . date("Y-m") . '%')
                    ->sum('amount');

                $opening_amount = DB::table('opening_amounts')
                    ->where('user_id',11)
                     ->get()->first()->opening_amount;

                $balance = $opening_amount - $totalpayment;
                $deficiency_amount = $totalpayment;
                $carry_over_amount = $balance;



                DB::table('petty_cash_transactions')->insert(['balance' => $balance,
                    'carry_over_amount' => $carry_over_amount,
                    'total_payment' => $totalpayment,
                    'deficiency_amount' => $deficiency_amount,
                    'branch_id' => 1,
                ]);
            }

      }

        if ($time == $next)

        {
            if($testing > 2)
            {

                $check_previous_data = DB::table('petty_cash_transactions')->where('branch_id', 2)
                    ->get()->last();

                $totalpayment = PettyCashSystem::where('branch_id', 2)
                    ->where('accountant', '1')
                    ->where('checker', '1')
                    ->where('created_at', 'like', '%' . date("Y-m") . '%')
                    ->sum('amount');

                $opening_amount = $check_previous_data->carry_over_amount +  $check_previous_data->deficiency_amount;

                $balance = $opening_amount - $totalpayment;
                $deficiency_amount = $totalpayment;
                $carry_over_amount = $balance;



                DB::table('petty_cash_transactions')->insert(['balance' => $balance,
                    'carry_over_amount' => $carry_over_amount,
                    'total_payment' => $totalpayment,
                    'deficiency_amount' => $deficiency_amount,
                    'branch_id' => 2,
                ]);


            }

            else

            {

                $totalpayment = PettyCashSystem::where('branch_id', 2)
                    ->where('accountant', '1')
                    ->where('checker', '1')
                    ->where('created_at', 'like', '%' . date("Y-m") . '%')
                    ->sum('amount');

                $opening_amount = DB::table('opening_amounts')
                    ->where('user_id',12)
                    ->get()->first()->opening_amount;

                $balance = $opening_amount - $totalpayment;
                $deficiency_amount = $totalpayment;
                $carry_over_amount = $balance;



                DB::table('petty_cash_transactions')->insert(['balance' => $balance,
                    'carry_over_amount' => $carry_over_amount,
                    'total_payment' => $totalpayment,
                    'deficiency_amount' => $deficiency_amount,
                    'branch_id' => 2,
                ]);
            }

        }







    }
}
