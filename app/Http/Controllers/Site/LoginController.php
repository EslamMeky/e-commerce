<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddUserRequest;
use App\Http\Requests\Admin\AdminLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        return view('Front.login');
    }

    public function saveLogin(AdminLoginRequest $request)
    {
        try {
            $remember=$request->has('remember_me')? true : false;
            if (Auth::guard('web')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')],$remember))
            {
                return redirect()->route('home');
            }
            else
            {
                return redirect()->route('login')->with(['error'=>'Incorrect Data']);
            }
        }
        catch (\Exception $ex){

            return redirect()->route('login')->with(['error'=>'SomeThing Wrong Try Again Later']);

        }

    }


    public function logout()
    {
        try {
            Session::flush();
            Auth::logout();
            return redirect()->route('login');

        }
        catch (\Exception $ex)
        {
            return redirect()->route('login')->with(['error'=>'SomeThing Wrong Try Again Later']);

        }
    }



    //////////////////////////////////

    public function register(){
        return view('Front.register');
    }

    public function saveUser(AddUserRequest $request)
    {
        try {
            if ($request->input('password')==$request->input('con_password')) {
                $path = uploadImage('user', $request->photo);
                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' =>bcrypt( $request->password),
                    'con_password' =>bcrypt( $request->con_password),
                    'mobile' => $request->mobile,
                    'address'=>$request->address,
                    'photo' => $path,
                ]);
                return redirect()->route('login')->with(['success' => 'Created User']);
            }else
            {
                return redirect()->route('register')->with(['error' => 'The password is not equal confirm password']);

            }

        }
        catch (\Exception $ex){
            return redirect()->route('login')->with(['error'=>'SomeThing Wrong Try Again Later']);
        }
    }
}
