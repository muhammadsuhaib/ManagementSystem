<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Sentinel;
use App\PettyCashSystem;
use App\OpeningAmount;
use Illuminate\Http\Request;
use App\Branch;

class OpeningAmountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'checker') {

            $totalpayment = PettyCashSystem::where('branch_id', Sentinel::getUser()->branch_id)
                ->where('accountant', '1')
                ->where('created_at', 'like', '%' . date("Y-m") . '%')
                ->sum('amount');
            $branch = Branch::find(Sentinel::getuser()->branch_id);


            //$data = DB::table('opening_amounts')->get();

            $data = DB::table('opening_amounts')
                ->leftJoin('users', function($join)
                {
                    $join->on('opening_amounts.user_id', '=', 'users.id');
                })
                ->where('branch_id', Sentinel::getUser()->branch_id)
                ->get();

            $branch = Branch::find(Sentinel::getuser()->branch_id);
           /* $user_opening_amount = DB::table('opening_amount')->get();
            echo '<pre>';print_r($user_opening_amount);echo '</pre>';die();*/

            /*$employees = DB::table('users')->get();*/

            $employees = DB::table('users')
                ->leftJoin('role_users', function($join)
                {
                    $join->on('role_users.user_id', '=', 'users.id');
                })
                ->where('role_id','1')
                 ->where('branch_id', Sentinel::getUser()->branch_id)
                ->get();

            return view('pettycash.openingamount', compact('data','employees', 'totalpayment', 'carry_over_amount', 'total_recieved_money', 'balance','branch'));
        } else {

            return redirect('/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user_id = $request->input('user_id');
        $opening_amount = $request->input('opening_amount');

        $record_count = DB::table('opening_amounts')->where('user_id',$user_id)->get()->count();
        if($record_count > 0){
            return back()->with('delete', 'Opening Amount Already Entered');
        }

        //echo '<pre>';print_r($record_count);echo '</pre>';die();

        $DataEntry = new OpeningAmount();
        $DataEntry->user_id = $user_id;
        $DataEntry->opening_amount = $opening_amount;
        $DataEntry->save();
        return back()->with('success', 'Opening Amount Successfully Added');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return dd($request);
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
