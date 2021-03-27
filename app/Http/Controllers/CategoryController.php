<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category(){

        $category = CategoryModel::get();

        return view('category',compact('category'));
    }

    public function category_add(request $request){
        $data= new CategoryModel();
        $data->mother_company = $request->mother_company;
        $data->children_company = $request->children_company;
        $data->save();
        return redirect()->back()->with('success','Category Inserted');


    }

    public function delete_category($id){
        $data= CategoryModel::find($id)->delete();
        return redirect()->back()->with('delete','Category Deleted');
    }

    public function categoryEdite(request $Request,$id){

        $edite = CategoryModel::find($id);
        $edite->category = $Request->category;
        $edite->save();

       return redirect()->back()->with('success','Category Updated');
    }


}
