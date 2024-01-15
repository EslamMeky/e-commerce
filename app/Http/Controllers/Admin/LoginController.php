<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminLoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
   public function index()
   {
       return view('Admin.login');
   }




   public function login(AdminLoginRequest $request)
   {
       try {
           $remember=$request->has('remember_me') ? true : false;
           if (Auth::guard('admin')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')],$remember)){
            return redirect()->route('Admin.dashboard');
           }
           else
           {
            return redirect()->route('admin.login')->with(['error'=>'Incorrect Data']);
           }


       }
       catch (\Exception $ex)
       {
           return redirect()->route('admin.login')->with(['error'=>'SomeThing Wrong Try Again Later']);
       }


   }



   public function logout()
   {
       try {

           Session::flush();
           Auth::logout();
           return redirect()->route('admin.login');

       }
       catch (\Exception $ex)
       {

           return redirect()->route('Admin.dashboard')->with(['error'=>'SomeThing Incorrect Try Again Later']);

       }

   }

}
