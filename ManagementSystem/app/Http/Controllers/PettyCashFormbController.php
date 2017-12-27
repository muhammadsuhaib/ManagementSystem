<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\PettyCashTransaction;
use Illuminate\Support\Facades\DB;
use Sentinel;
use App\PettyCashSystem;
use Illuminate\Http\Request;

class PettyCashFormbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()


    {
        if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'checker') {





            $total_payment = PettyCashSystem::where('branch_id', Sentinel::getUser()->branch_id)
                ->where('accountant', '1')
                ->where('created_at', 'like', '%' . date("Y-m") . '%')
                ->sum('amount');



            $data = PettyCashSystem::where('branch_id', Sentinel::getUser()->branch_id)

                ->orderBy('id','desc')
                ->with('branch')
                ->get();

            return view('pettycash.bform', compact('data', 'total_payment', 'carry_over_amount', 'total_recieved_money', 'balance'));
        }


        else {

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

            $total = $deficiency_amount + $carry_over_amount;

        return view('pettycash.transaction', compact('data','total', 'deficiency_amount','total_payment', 'carry_over_amount', 'total_received_amount', 'balance'));


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
        $record->checker = $request->checker;
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
        return dd($request);
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
