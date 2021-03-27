<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class RegController extends Controller
{

    // public function loginGet(){
    //     return view('auth.login');
    // }

    public function register_page(){
        return view('/auth.register');
    }


    public function registration(request $request){
        $validator = Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required|min:6',
            'name'=>'required'
         ]);
         if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $data = [
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'status'=>1,
             ];

             $user = User::where('email',$request->email)->first();

             if($user){
               return back()->with('success', "Email is already taken. ");
             }else{
               try {
                   User::create($data);
                   return back()->with('success', "wait for the confirmation");
               } catch (\Exception $exception) {
                   return back()->with('success', $exception->getMessage());
               }

           }

        }
    }

}
