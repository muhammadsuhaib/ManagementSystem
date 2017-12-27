<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\PettyCashSystem;
use App\PettyCashTransaction;
use Illuminate\Http\Request;
use Sentinel;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug =='checker')

        {
//

            return redirect()->route('pettycashb.index');

//                  }

        }

        elseif (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug =='cashier')

        {
            return redirect()->route('pettycasha.index');
        }

        elseif (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug =='accountant')

        {
            return redirect()->route('pettycashc.index');
        }

        else

        {
            return view ('login.login' );

        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {

//        return dd ($request->all());

        $user = Sentinel::authenticate($request->all());
        if ($user) {


            if (Sentinel::getUser()->roles()->first()->slug == 'checker')

            {
                ini_set('memory_limit', '-1');


                $now = Carbon::now()->day;
                $next = Carbon::now()->startOfMonth()->day;

                $testing = DB::table('petty_cash_transactions')
                    ->where('branch_id', Sentinel::getUser()->branch_id)
                    ->where('checker_status', '0')
                    ->whereDate('created_at', 'like', '%' . date('Y-m-d', strtotime('last day of last month')) . '%')->count();

                if ($now == $next && $testing > 0)

                {
                    return redirect('/request');
                }

                else

                    {

                    return redirect()->route('pettycashb.index');

                    }
            }

            elseif (Sentinel::getUser()->roles()->first()->slug == 'cashier')

            {


//
//                $time = Carbon::now()->endOfDay('Asia/Tokyo'); // Ajj k din = 29
//                $next = Carbon::now()->endOfMonth('Asia/Tokyo');// = 31
//
////                echo '<pre>';print_r($time . ' ' . $next);echo '</pre>';die();
//
//
//
//                $totalpayment = PettyCashSystem::where('branch_id', Sentinel::getUser()->branch_id)
//                    ->where('accountant', '1')
//                    ->where('created_at', 'like', '%' . date("Y-m") . '%')
//                    ->sum('amount');
//
//
//                $opening_amount = DB::table('opening_amounts')
//                    ->where('user_id', Sentinel::getUser()->id)
//                    ->get()->first()->opening_amount;
//
//                $balance = $opening_amount - $totalpayment;
//
////                return dd( $check_previous_data_count,$check_previous_data,$opening_amount);
//
//
////
//                if ($time == $next) {
//////                    echo  $time.">=".$next
//////                        ;exit;
//                    $deficiency_amount = $totalpayment;
//                    $carry_over_amount = $balance;
//                    $total_received_amount = $deficiency_amount+ $deficiency_amount;
//
//
//
//                    DB::table('petty_cash_transactions')->insert(['balance' => $balance,
//                        'carry_over_amount' => $carry_over_amount,
//                        'total_payment' => $totalpayment,
//                        'total_received_amount' => $total_received_amount,
//                        'checker_opening_amount' => $opening_amount,
//                        'deficiency_amount' => $deficiency_amount,
//                        'branch_id' => Sentinel::getUser()->branch_id,
//
//
//                    ]);
//
//
//                    return redirect()->route('pettycasha.index');
//                }
//
//                else
//                {


                    return redirect()->route('pettycasha.index');
                }






//            }

            elseif (Sentinel::getUser()->roles()->first()->slug == 'accountant')

            {

                return redirect()->route('pettycashc.index');
            }

            else {

                return back()->with(['error', 'Wrong User ID or Password :']);
            }
        }
    }
        /**
         * Display the specified resource.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function logout()
    {

    Sentinel::logout();
    return redirect('/login');

    }

}

