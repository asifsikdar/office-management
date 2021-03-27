<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RollController extends Controller
{
    public function roll_page(){
        $user= User::get();
        return view('user_roll_view',compact('user'));
    }

    public function RollUpdate($id){
       $userup=User::find($id);
       $userup->status=2;
       $userup->save();
       return redirect()->back()->with('success','updated');
    }
}
