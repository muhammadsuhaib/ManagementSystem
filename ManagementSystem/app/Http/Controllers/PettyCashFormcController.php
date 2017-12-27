<?php

namespace App\Http\Controllers;

use App\PettyCashTransaction;
use Illuminate\Support\Facades\DB;
use Sentinel;
use App\PettyCashSystem;
use Illuminate\Http\Request;
use function Sodium\compare;
use App\Http\Controllers\PettyCashFormAController;
class PettyCashFormcController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index(Request $request)
    public function index()
    {


        if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'accountant') {

            $data = PettyCashSystem::where('branch_id', Sentinel::getUser()->branch_id)
                ->where('checker', 1)
                ->orderBy('id','desc')
                ->get();
//
//        $search = DB::table('petty_cash_systems')
//            ->where ('created_at', 'like', '%'.date("Y-m").'%')
//            ->where ('branch_id', Sentinel::getUser()->branch_id)
//            ->sum('amount');

//

//




            $total_payment = PettyCashSystem::where('branch_id', Sentinel::getUser()->branch_id)
                ->where('accountant', '1')
                ->where('created_at', 'like', '%' . date("Y-m") . '%')
                ->sum('amount');


            $bdaymonth = null;
            if ($bdaymonth) {




                $data = DB::table('petty_cash_systems')
                    ->whereDate('created_at', $bdaymonth)
                    ->where('branch_id', Sentinel::getUser()->branch_id)
                    ->get();
//        return dd($search);
            }


            return view('pettycash.cform', compact('data','opening_amount', 'total_payment', 'carry_over_amount', 'total_recieved_money', 'balance', 'search'));
        } else {
            return redirect('/login');
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)


    {

        $carry_over_amount = PettyCashTransaction::where
        ('created_at', 'like', '%' . $request->bdaymonth . '%')
            ->where('branch_id', Sentinel::getUser()->branch_id)
            ->where('checker_status', '1')
            ->sum('carry_over_amount');


        $deficiency_amount = PettyCashTransaction::where
        ('created_at', 'like', '%' . $request->bdaymonth . '%')
            ->where('branch_id', Sentinel::getUser()->branch_id)
            ->where('checker_status', '1')
            ->sum('deficiency_amount');


        $total_payment = PettyCashTransaction::where
        ('created_at', 'like', '%' . $request->bdaymonth . '%')
            ->where('branch_id', Sentinel::getUser()->branch_id)
            ->where('checker_status', '1')
            ->sum('total_payment');

        $balance = PettyCashTransaction::where
        ('created_at', 'like', '%' . $request->bdaymonth . '%')
            ->where('branch_id', Sentinel::getUser()->branch_id)
            ->where('checker_status', '1')
            ->sum('balance');



        return view('pettycash.transaction', compact('data', 'deficiency_amount','total_payment', 'carry_over_amount', 'total_received_amount', 'balance'));
//

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $record = PettyCashSystem::find($id);
        $record->accountant = $request->accountant;
        $record->save();
        return back();
    }

    /**
     * Show the form for editing the specified resource.
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
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
