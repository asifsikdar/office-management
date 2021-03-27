<?php

namespace App\Http\Controllers;

use App\Models\EmployeeModel;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function employee_page(){
        // $emp=EmployeeModel::get();
        return view('employee');
    }
}
