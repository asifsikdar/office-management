<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
    use HasFactory;
    public function get_employee(){
        return $this->belongsTo(SalaryModel::class,'salary');
    }
}
