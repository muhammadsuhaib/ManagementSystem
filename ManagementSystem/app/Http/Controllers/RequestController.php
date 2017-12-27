<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\PettyCashTransaction;
use Sentinel;
class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $data = PettyCashTransaction::all();

        $carry_over_amount =DB::table('petty_cash_transactions')
            ->where('branch_id', Sentinel::getUser()->branch_id)
           ->where('checker_status', '0')
            ->whereDate('created_at', 'like', '%' . date('Y-m-d', strtotime('last day of last month')) . '%')
            ->sum('carry_over_amount');


        $deficiency_amount =DB::table('petty_cash_transactions')
            ->where('branch_id', Sentinel::getUser()->branch_id)
            ->where('checker_status', '0')
            ->whereDate('created_at', 'like', '%' . date('Y-m-d', strtotime('last day of last month')) . '%')
            ->sum('deficiency_amount');



        return view('pettycash.requestpage',compact('carry_over_amount','deficiency_amount','data'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $record = PettyCashTransaction::find($id);
        $record->checker_status = $request->checker;
        $record->save();
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
}
