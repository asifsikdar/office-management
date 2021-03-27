<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryModel;

class IncomeModel extends Model
{
    use HasFactory;

    function get_category(){
        return $this->belongsTo(CategoryModel::class,'mother_company');
    }



    protected $fillable=[
      'category',
      'income_amount',
      'status',
    ];
}
