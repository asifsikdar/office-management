<?php

namespace App\Http\Controllers;

use App\Models\GoalModel;
use App\Models\GoalMonthlyModel;
use App\Models\GoalMonthlyReport;
use App\Models\IncomeModel;

use Illuminate\Http\Request;

class GoalController extends Controller
{
     public function GoalPage(){
         $data['goalpage']=GoalModel::get();

        $month = date('m');
        $data['totalincome'] =0;
        $total = IncomeModel::whereMonth('created_at',$month)->get();
        foreach($total  as $tot){
           $data['totalincome'] +=$tot->income_amount;
        }
         return view('goal',$data);
     }

     public function GoalAdd(request $request){
         $goal= new GoalModel();
         $goal->goal=$request->goal;
         $goal->save();
         return redirect()->back()->with('success','success');
     }

    //  public function GoalTrashPermanent($id){
    //      $goal= GoalModel::find($id);
    //      $goal->delete();
    //      return redirect()->back()->with('delete','Data Deleted');
    //  }


    public function GoalUpdate(request $request,$id){
       $goal= GoalModel::find($id);
       $goal->goal=$request->goal;
       $goal->save();
       return redirect()->back()->with('success','Updated');
    }

    public function GoalMonthlyView(){
        GoalMonthlyModel::get();
        return view('goal_monthly_record');
    }

    public function GoalMonthAdd(request $request){
        $month=date('m',strtotime($request->goaldatemonthly));

        $query=GoalMonthlyModel::whereMonth('goaldatemonthly',$month)->exists();
        $request->validate([
            'goaldatemonthly'=>'required'
        ]);

        if($query){
            return redirect()->back()->with('delete','this month already exists');
        }

            $goalmonth= new GoalMonthlyModel();
            $goalmonth->goaldatemonthly=$request->goaldatemonthly;
            $goalmonth->goal=$request->goal;
            $goalmonth->save();

        return redirect()->back()->with('success','Month Added');

    }

}
