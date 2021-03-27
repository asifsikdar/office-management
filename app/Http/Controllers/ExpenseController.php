<?php

namespace App\Http\Controllers;

use App\Models\ExpenseModel;
use App\Models\ExpenseRecordModel;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function expense(){
        $expense= ExpenseModel::with('get_category')->get();
        return view('expense',compact('expense'));
    }


    public function add_expense(request $request){
        $data= new ExpenseModel();
        $data->mother_company = $request->input('mother_company');
        $data->expense_category = $request->input('expense_category');
        $data->expense_amount = $request->expense_amount;
        $data->save();
        return redirect()->back()->with('success','Inserted');
    }

    public function expense_delete($id){
        ExpenseModel::find($id)->delete();
        return redirect()->back()->with('delete','Deleted');
    }
    public function expense_update(request $request,$id){
        $data=ExpenseModel::find($id);
        $data->mother_company = $request->input('mother_company');
        $data->expense_category = $request->input('expense_category');
        $data->expense_amount = $request->expense_amount;
        $data->save();
        return redirect()->back()->with('success','Inserted');
    }

    public function MonthExpense(request $request){
        //    dd($request->all());



            $month = date('m',strtotime($request->expense_month));

        //    return $request->expense_month;



            $query = ExpenseRecordModel::whereMonth('expense_month',$month)->exists();
            // dd($query);

            $request->validate([

                'expense_month'=>'required'
            ]);

            if($query){

                return redirect()->back()->with('success','This Month Income report Already Send');
            }else{





            foreach($request->employee_id as $key=> $enmid){



                 $store = new ExpenseRecordModel();
                 $store->employee_id = $enmid;
                 $store->expense_month = $request->expense_month;
                 $store->expense_category = $request->expense_category[$key];
                 $store->mother_company = $request->mother_company[$key];
                 $store->expense_amount = $request->expense_amount[$key];
                 $store->expense_status = $request->expense_status[$key];
                 $store->save();




            }
            return redirect()->back();

            }

        }

        public function MonthExpensePage(request $request){
                $salary = ExpenseRecordModel::select('expense_month')->groupBy('expense_month')->get();

    //            dd($salary);
    //
                return view('expense_monthly_record', compact('salary'));
        }

        public function expense_month_delete($expense_month){
           $salary=ExpenseRecordModel::where('expense_month',$expense_month);
           $salary->delete();
           return redirect()->back()->with('success','Deleted');
        }

        public function ExpenseMonthSingle($expense_month){
            $salary = ExpenseRecordModel::where('expense_month',$expense_month)->get() ;
            $salary1=ExpenseRecordModel::get();

    //        dd($salary);
            return view('expense_single_month_record', compact('salary','salary1'));
        }

        public function UpdateMonthIncome(request $request,$emp_id){
           $income_model = ExpenseRecordModel::find($emp_id);
           $income_model->income=$request->income;
           $income_model->income_month=$request->income_month;
           $income_model->save();
            // $salary = IncomeMonthlyReport::where('employee_id',$emp_id)->first();
            // $salary->income_status='0';
            // $salary->save();

    //        dd($salary);
            return redirect()->back()->with('success','Updated');
        }

}
