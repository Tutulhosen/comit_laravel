<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * show profile page
     */
    public function showProfile()
    {
        return view('admin.profile.profile');
    }

    /**
     * upload admin profile photo
     */
public function uploadPhoto(Request $request, $id)
{
$user_id= AdminUser::findOrFail($id);

if ($request->hasFile('photo')) {
    $file= $request->file('photo');
    $file_name = md5(time() . rand()) . '.' . $file->clientExtension();
    $file->move(storage_path('app/public/admin/'), $file_name);
    if ($user_id->photo !='avatar.png') {
        unlink(storage_path('app/public/admin/' . $user_id->photo));
    }

    $user_id->update([
        'photo'         =>$file_name
    ]);
    return back();
} else {
    return back();
}




}

/**
 * admin user password change
 */
public function changePassword(Request $request, $id)
{
    $this->validate($request, [
        'old_password'                  =>'required',
        'password'                          =>'required|confirmed',
        'password_confirmation' => 'required'
    ]);
    $user_id= AdminUser::findOrFail($id);
    if (password_verify($request->old_password, $user_id->password)==false) {
        return back()->with('success-mid', 'incorrect old password');

    }else{
        $user_id->update([
            'password'          => Hash::make($request->password),
        ]);
        return back()->with('success', 'successfully changed your password');
    }
}








}
