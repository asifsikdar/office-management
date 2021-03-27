<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SalaryModel;

class ExpenseModel extends Model
{
    use HasFactory;
    function get_category(){
        return $this->belongsTo('App\Models\CategoryModel','mother_company');
    }

    function get_salary(){
        return $this->belongsTo('App\Models\SalaryModel','salary_amount','id');
    }
}
