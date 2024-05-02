<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddAdminRequest;
use App\Http\Requests\Admin\AddUserRequest;
use App\Models\Admin;
use App\Models\Cart;
use App\Models\MainCategory;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class AdminController extends Controller
{

    public function index()
    {
        $categories=SubCategory::selection()->paginate(PAGINATE);
        $orders=Cart::with('order.users')->select('id','order_id','items','quy','total','status','created_at')->paginate(PAGINATE);

        return view('Admin.dashboard',compact('categories','orders'));
    }

    public function create_admin()
    {
        return view('Admin.Add.admin.create');
    }

    public function store_admin(AddAdminRequest $request)
    {
        // validation
        try {
            if ($request->input('password')==$request->input('com_password'))
            {
                $path_file = uploadImage('admin', $request->photo);
                Admin::create([
                    'photo' => $path_file,
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' =>bcrypt($request->password),
                    'com_password' => bcrypt($request->com_password),
                ]);
                return redirect()->route('create_admin')->with(['success'=>'Done Added Admin']);

            }
            else
            {
                return redirect()->route('create_admin')->with(['error'=>' The password is not equal confirm password ']);

            }

        }
        catch (\Exception $ex)
        {
            return redirect()->route('create_admin')->with(['error'=>'SomeThing Incorrect Try Again Later']);
        }


    }

    public function show_admin()
    {
        $admins=Admin::selection()->paginate(PAGINATE);
        return view('Admin.Add.admin.show',compact('admins'));
    }

    public function edit_admin($id)
    {
        try {
            $admin=Admin::selection()->find($id);
            if (!$admin)
                return redirect()->route('show_admin')->with(['error'=>'Not found This Admin']);
            return  view('Admin.Add.admin.edit',compact('admin'));
        }
        catch (\Exception $ex)
        {
            return redirect()->route('show_admin')->with(['error'=>'SomeThing Incorrect Try Again Later']);
        }
    }

    public function update_admin($id ,AddAdminRequest $request)
    {
        try
        {
           $admin= Admin::find($id);
            if (!$admin)
                return redirect()->route('show_admin')->with(['error'=>'Not found This Admin']);

            Admin::where('id',$id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
               ]);
            if ($request->has('photo'))
            {
                $path_file=uploadImage('admin',$request->photo);
                Admin::where('id',$id)->update([
                    'photo'=>$path_file,
                ]);
            }
            return redirect()->route('show_admin')->with(['success'=>'Done Updated ']);

        }
        catch (\Exception $ex)
        {
            return redirect()->route('show_admin')->with(['error'=>'SomeThing Incorrect Try Again Later']);

        }
    }

    public function delete_admin($id)
    {
        try {
            $admin=Admin::find($id);
            if (!$admin)
                return redirect()->route('show_admin')->with(['error'=>'Not found This Admin']);

            $image=Str::after($admin->photo,'assets/');
            $image=base_path('public/assets/'.$image);
            unlink($image);
            $admin->delete();
            return redirect()->route('show_admin')->with(['success'=>'Done Deleted ']);

        }
        catch (\Exception $ex)
        {
//            return $ex;
            return redirect()->route('show_admin')->with(['error'=>'SomeThing Incorrect Try Again Later']);

        }

    }





    ///////////////////  User  ////////////////


    public function create_user()
    {
        return view('Admin.Add.user.create');
    }

    public function store_user(AddUserRequest $request)
    {
        try {
            if ($request->input('password')==$request->input('con_password'))
            {
                $path_file = uploadImage('user', $request->photo);
                User::create([
                    'photo' => $path_file,
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'con_password' => bcrypt($request->con_password),
                ]);
                return redirect()->route('create_user')->with(['success' => 'Done Added User']);
            }
            else
            {
                return redirect()->route('create_user')->with(['error'=>' The password is not equal confirm password ']);

            }
        }
        catch (\Exception $ex)
        {
            return redirect()->route('create_user')->with(['error'=>'SomeThing Incorrect Try Again Later']);

        }
    }


    public function show_user()
    {
        $users=User::selection()->paginate(PAGINATE);
        return view('Admin.Add.user.show',compact('users'));
    }

    public function edit_user($id)
    {
        try
        {
            $user=User::find($id);
            if (!$user)
                return redirect()->route('show_user')->with(['error'=>'Not found This User']);
            return  view('Admin.Add.user.edit',compact('user'));
        }
        catch (\Exception $ex)
        {
            return redirect()->route('show_user')->with(['error'=>'SomeThing Incorrect Try Again Later']);

        }
    }

    public function update_user($id,AddUserRequest $request)
    {
        try
        {
            $user=User::find($id);
            if (!$user)
                return redirect()->route('show_user')->with(['error'=>'Not found This User']);
            User::where('id',$id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
            ]);
            if ($request->has('photo'))
            {
                $path_file=uploadImage('user',$request->photo);
               User::where('id',$id)->update([
                  'photo'=>$path_file,
               ]);
            }
            return redirect()->route('show_user')->with(['success'=>'Done Updated ']);

        }
        catch (\Exception $ex)
        {
            return redirect()->route('show_user')->with(['error'=>'SomeThing Incorrect Try Again Later']);

        }

    }

    public function delete_user($id)
    {
        try
        {
            $user=User::find($id);
            if (!$user)
                return redirect()->route('show_user')->with(['error'=>'Not found This User']);


             $image=Str::after($user->photo,'assets/');
            $image=base_path('public/assets/'.$image);
            unlink($image);
            $user->delete();
            return redirect()->route('show_user')->with(['success'=>'Done Deleted ']);
        }
        catch (\Exception $ex)
        {
            return redirect()->route('show_user')->with(['error'=>'SomeThing Incorrect Try Again Later']);

        }



    }

}
