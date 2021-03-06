<?php

namespace App\Http\Controllers\admin;

use App\Models\Role;
use App\Models\AdminUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\UserAccountMail;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
   /**
    * show login page
    */
    public function showLogin()
    {
       return view('admin.login');
    }

    /**
     * admin login system
     */
    public function loginSystem(Request $request)
    {
        $this->validate($request, [
            'email'             =>'required|email',
            'password'          =>'required'
        ]);
        if (Auth::guard('admin')->attempt([
            'email'                         =>$request->email,
            'password'                      =>$request->password
        ])) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.login')->with('success-mid', 'wrong email or password');
        }

    }
    /**
     * admin logout system
     */
    public function logoutSystem()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    /**
     * admin register page
     */
    public function showReg()
    {   $role_data= Role::all();
        return view('admin.register', compact('role_data'));
    }


    /**
     * store admin user data
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'                          =>'required',
            'email'                         =>'required|unique:admin_users',
            'username'                      =>'required|unique:admin_users',
            'cell'                          =>'required|unique:admin_users',
        ]);

       $admin= AdminUser::create([
            'name'                              =>$request->name,
            'email'                             =>$request->email,
            'username'                          =>$request->username,
            'cell'                              =>$request->cell,
            'password'                          =>Hash::make('123456789'),
            'role_id'                           =>$request->role,
        ]);
        //notification system
        $data=[
                 'name'  =>$request->name,
                 'cell'  =>$request->cell,
                 'email'  =>$request->email,
                 'username'  =>$request->username,
                 'password'  =>'123456789',
             ];

             $admin->notify(new UserNotification($data));




             //email system
        // $data=[
        //     'name'  =>$request->name,
        //     'cell'  =>$request->cell,
        //     'email'  =>$request->email,
        //     'username'  =>$request->username,
        //     'password'  =>'123456789',
        // ];
        // Mail::to($request->email)->send(new UserAccountMail($data));
        return redirect()->route('admin.reg')->with('success', 'Your registration is successful. Check your email');


    }




}
