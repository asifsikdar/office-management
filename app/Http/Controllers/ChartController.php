<?php

namespace App\Http\Controllers;

use App\Models\IncomeModel;
use DB;
use App\Models\IncomeMonthlyReport;
use App\Models\ExpenseRecordModel;
use Illuminate\Http\Request;

class ChartController extends Controller
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function chart_js()
    {
        $users = IncomeMonthlyReport::select(DB::raw("COUNT(*) as count"))
        ->whereMonth('created_at', date('m'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');

return view('income', compact('users'));
    }


            /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     public function chart_expense()
     {
         $users = ExpenseRecordModel::select(DB::raw("COUNT(*) as count"))
         ->whereMonth('created_at', date('m'))
         ->groupBy(DB::raw("Month(created_at)"))
         ->pluck('count');

 return view('expense', compact('users'));
     }
}
