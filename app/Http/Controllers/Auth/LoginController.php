<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function login_post(request $request){
         $user = User::where('email',$request->email)->first();
         if($user){
             if($user->status==1){
                 if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                     return view('dashboard');
                  }
                  else{
                     return back()->with('delete','Only for Admin login');
                  }
                 }
             }
         }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
