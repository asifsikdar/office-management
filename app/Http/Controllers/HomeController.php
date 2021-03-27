<?php

namespace App\Http\Controllers;

use App\Models\ExpenseModel;
use App\Models\IncomeModel;
use App\Models\SalaryModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $month = date('m');
        $data['totalincome'] =0;
        $total = IncomeModel::whereMonth('created_at',$month)->get();
        foreach($total  as $tot){
           $data['totalincome'] +=$tot->income_amount;
        }



        $data['totalexpence'] =0;
        $totalex = ExpenseModel::whereMonth('created_at',$month)->get();
        foreach($totalex  as $totes){
           $data['totalexpence'] +=$totes->expense_amount;

        }


        $data['totalesalary'] =0;
        $totalsala = SalaryModel::whereMonth('created_at',$month)->get();
        foreach($totalsala  as $totesal){
           $data['totalesalary'] +=$totesal->salary_amount;

        }

        $totalall = 0;

        $data['totalall']=$data['totalesalary']+$data['totalexpence'];




        return view('dashboard',$data);
    }
}
