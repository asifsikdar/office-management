<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewMonth_Model extends Model
{
    use HasFactory;
    function get_salary(){
        return $this->belongsTo('App\Models\SalaryModel','salary_amount');
    }
}
