<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
   /**
    * show admin user page
    */

    public function index()
    {
        $admin_user_data= AdminUser::latest()->get();
        $role_data              = Role::latest()->get();
        $type                       = 'add';
        return view('admin.user.index', compact('admin_user_data','role_data', 'type'));
    }

    /**
    * show admin user edit page
    */

    public function edit($id)
    {
        $admin_user_data= AdminUser::latest()->get();
        $role_data              = Role::latest()->get();
        $edit_user_data     = AdminUser::findOrFail($id);
        $type                       = 'edit';
        return view('admin.user.index', compact('admin_user_data','role_data', 'type' ,'edit_user_data'));
    }

    /**
     * store admin user data
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'name'                        =>'required',
            'email'                        =>'required|unique:admin_users',
            'username'                =>'required|unique:admin_users',
            'cell'                            =>'required|unique:admin_users',
        ]);

        AdminUser::create([
            'name'                              =>$request->name,
            'email'                              =>$request->email,
            'username'                      =>$request->username,
            'cell'                                  =>$request->cell,
            'password'                      =>Hash::make('123456789'),
            'role_id'                            =>$request->role,
        ]);
        return redirect()->route('admin.user')->with('success', 'Successfully add a new user');


    }


    /**
     * delete admin user data
     */
    public function destroy($id)
    {
        $delete_admin_id= AdminUser::findOrFail($id);
        if ($delete_admin_id->name == 'Super Admin') {
            return back()->with('success-mid', 'You can not delete super admin data');
        } else {
            $delete_admin_id->delete();
            return back()->with('success-mid', 'Admin data is deleted');
        }

    }

    /**
     * update user data
     */
    public function updateAdmin(Request $request, $id)
    {

        $update_data= AdminUser::findOrFail($id);
        $update_data->update([
            'name'                              =>$request->name,
            'email'                              =>$request->email,
            'username'                      =>$request->username,
            'cell'                                  =>$request->cell,
            'role_id'                            =>$request->role,
            'photo'                              => 'avatar.png'
        ]);
        return redirect()->route('admin.user')->with('succcss', 'successfully update the admin user data');
    }




}
