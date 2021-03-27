<?php

namespace App\Http\Controllers;

use App\Models\IncomeMonthlyReport;
use App\Models\IncomeModel;
use App\Models\CategoryModel;
use Illuminate\Http\Request;

use App\Models\Donate;


class IncomeController extends Controller
{
   public function income_page(){
       $month = date('m');
       $year = date('Y');

       $income= IncomeModel::with('get_category')->whereMonth('created_at',$month)->whereYear('created_at',$year)->get();
       return view('income',compact('income'));
   }

    public function add_income(request $request){
        $data= new IncomeModel();
        $data->mother_company = $request->input('mother_company');
        $data->children_company = $request->input('children_company');
        $data->income_amount = $request->income_amount;
        $data->save();
        return redirect()->back()->with('success','Inserted');
    }

    public function income_trash($id){
        IncomeModel::find($id)->delete();
        return redirect()->back()->with('delete','Data Deleted');
    }



    public function income_edit(request $request,$id){
        $data= IncomeModel::find($id);
        $data->mother_company = $request->input('mother_company');
        $data->children_company = $request->input('children_company');
        $data->income_amount = $request->income_amount;
        $data->save();
        return redirect()->back()->with('success','Updated');
    }

    public function MonthIncome(request $request){
            //    dd($request->all());



                $month = date('m',strtotime($request->income_month));

            //    return $request->income_month;



                $query = IncomeMonthlyReport::whereMonth('income_month',$month)->exists();
                // dd($query);

                $request->validate([

                    'income_month'=>'required'
                ]);

                if($query){

                    return redirect()->back()->with('success','This Month Income report Already Send');
                }else{

                foreach($request->employee_id as $key=> $enmid){

                     $store = new IncomeMonthlyReport();
                     $store->employee_id = $enmid;
                     $store->income_month = $request->income_month;
                     $store->income = $request->income[$key];
                     $store->income_status = $request->income_status[$key];
                     $store->save();

                }
                return redirect()->back();

                }

            }

            public function MonthIncomeView(request $request){
                    $salary = IncomeMonthlyReport::select('income_month')->groupBy('income_month')->get();

        //            dd($salary);
        //
                    return view('income_monthly_record', compact('salary'));
            }

            public function MonthIncomeSingle($income_month){
                $salary = IncomeMonthlyReport::where('income_month',$income_month)->get() ;

        //        dd($salary);
                return view('single_income_data', compact('salary'));
            }

            public function UpdateMonthIncome(request $request,$emp_id){
               $income_model = IncomeMonthlyReport::find($emp_id);
               $income_model->income=$request->income;
               $income_model->income_month=$request->income_month;
               $income_model->save();

                return redirect()->back()->with('success','Updated');
            }

            public function Monthly_trash($income_month){
                $trash= IncomeMonthlyReport::where('income_month',$income_month);
                $trash->delete();
                return redirect()->back()->with('delete','Deleted');
            }



        public function DonatePage(){
            $month = date('m');
            $year = date('Y');

          $data['income']= IncomeModel::with('get_category')->whereMonth('created_at',$month)->whereYear('created_at',$year)->get();


            return view('donation_page',$data);
        }

        public function donate(request $request){
            // return $request->all();
            // dd();

            $rangeChanking = IncomeModel::where('id',$request->Getid)->first();



            if($rangeChanking->income_amount<$request->income_amount){

             return redirect()->back()->with('delete','this table income is lower then other table income');
            }else{

                //.....................Childern Form Donation...................
                  $donation_from = IncomeModel::where('id',$request->child_category_form)->first();
                   $donationammountform = $request->income_amount;
                   $donation_amm =$donation_from->income_amount;
                   $totalcalculation_form_donation = $donation_amm-$donationammountform;

                   $donation_from->income_amount = $totalcalculation_form_donation;
                   $donation_from->save();

                //.....................Childern Form Donation End...................


                //.....................Childern To Donation...................

                $donation_to = IncomeModel::where('id',$request->children_company_to)->first();
                $donationammountto = $request->income_amount;
                $donationto_amm =$donation_to->income_amount;
                $totalcalculationdonationTo = $donationto_amm + $donationammountto;

                $donation_to->income_amount = $totalcalculationdonationTo;
                $donation_to->save();

                //.....................Childern To Donation To...................

                  $donationtable =new Donate();
                  $donationtable->donation_in_id = $request->children_company_to;
                  $donationtable->donation_in_ammount = $donationammountto;

                  $donationtable->donation_out_id = $request->child_category_form;
                  $donationtable->donation_out_ammount = $donationammountform;
                  $donationtable->save();

                  return redirect()->back();
            }




    }







}
