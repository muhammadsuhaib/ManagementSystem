<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Branch;
use App\PettyCashSystem;
use Illuminate\Http\Request;
use Sentinel;
class PrintController extends Controller
{
    public function printview($id)

    {

        $totalpayment = DB::table('petty_cash_systems')
            ->where('employee_id',Sentinel::getuser()->id)
            ->sum('amount');


        $datas = PettyCashSystem::where('id',$id)
            ->with('branch')
            ->first();


        $carryoveramount = 80000;
        $totalrecvamount = 20000;
        $balance = $totalrecvamount + $carryoveramount -$totalpayment;
        return view ('prints.forma',compact('datas','carryoveramount','totalrecvamount','balance','totalpayment'));

    }
}
