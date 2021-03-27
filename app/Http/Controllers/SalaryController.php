<?php

namespace App\Http\Controllers;

use App\Models\SalaryModel;
use App\Models\NewMonth_Model;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\RecordSalary;

class SalaryController extends Controller
{
    public function salary_page(){



        $salary= SalaryModel::where('status','0')->Orwhere('status','1')->get();
        // $salary= SalaryModel::where('start_date')->get();
        return view('salary',compact('salary'));
    }





    public function add_salary(request $request){
        $add= new SalaryModel();
        $add->empid=$request->empid;
        $add->joindate=$request->joindate;
        $add->name=$request->name;
        $add->designation=$request->designation;
        $add->bankname=$request->bankname;
        $add->bankdetails=$request->bankdetails;
        $add->salary_amount=$request->salary_amount;
        $add->bonus=$request->bonus;
        $add->save();
        return redirect()->back()->with('success','Added Salary');
    }

    public function update_status($id){
        $active= SalaryModel::find($id);
        $active->status = 0;
        $active->save();
        return redirect()->back();

    }

    public function status_ending($id){
        $act= SalaryModel::find($id);
        $act->status = 1;
        $act->save();
        return redirect()->back();

    }

    public function trash($id){
        SalaryModel::find($id)->delete();
        return redirect()->back()->with('delete','Deleted');
    }

    public function edit(request $request,$id){
        $add= SalaryModel::find($id);
        $add->joindate=$request->joindate;
        $add->name=$request->name;
        $add->designation=$request->designation;
        $add->bankdetails=$request->bankdetails;
        $add->salary_amount=$request->salary_amount;
        $add->save();
        return redirect()->back()->with('success','Updated Salary');
    }

    public function pre_salary(){
        $salary=SalaryModel::where('status','0')->get();
        return view('previews_salary',compact('salary'));
    }

    // Add-new-Month
    public function new_month(request $request){
        $new= new NewMonth_Model();
        $new->new_month=$request->new_month;
        $new->status=$request->status;
        $new->save();
        return redirect()->back()->with('success','Success');

    }

    public function new_month_record(request $request){
//        return $request->all();

        $month = date('m',strtotime($request->salary_month));
        $year = date('Y',strtotime($request->salary_month));

        // dd($year);

    //    dd($month);

        $query = RecordSalary::whereMonth('salary_month',$month)->whereYear('salary_month',$year)->exists();


        $request->validate([

            'salary_month'=>'required'
        ]);

        if($query){

            return redirect()->back()->with('success','This Month Salary Already Paid');
        }else{

            // return $request->all();



        foreach($request->employee_id as $key => $enmid){


             $store = new RecordSalary();

             $store->employee_id = $enmid;
             $store->salary_month = $request->salary_month;
             $store->payment = $request->payment[$key];
             $store->salary_status = $request->salary[$key];
             $store->save();

        }
        return redirect()->back();

        }

    }

    public function view_monthly_record(request $request){
            $salary = RecordSalary::select('salary_month')->groupBy('salary_month')->get();

//            dd($salary);
//
            return view('view_monthly_record', compact('salary'));
    }

    public function SingleMonthView($salary_month){
        $salary = RecordSalary::where('salary_month',$salary_month)->get() ;

//        dd($salary);
        return view('month_wise_salary_view', compact('salary'));
    }

    public function EmpUpadateSal($emp_id){
//        $salary_model = SalaryModel::where('id',$emp_id)->first();
//        $salary_model->status='0';
//        $salary_model->save();
//        dd($salary_model);
        $salary = RecordSalary::where('employee_id',$emp_id)->first();
        $salary->salary_status='0';
        $salary->save();

//        dd($salary);
        return view('month_wise_salary_view', compact('salary'));
    }

    public function UpdateMonthRecord(request $request){
//        return $request->all();


       foreach($request->status_update as $key=> $abul){
           $kalam = RecordSalary::where('employee_id', $key)->where('salary_month',$request->mm)->update(['salary_status'=>'0']);
//           $kalam->salary_status ='0';

       }


       return redirect()->back();

    }


}
