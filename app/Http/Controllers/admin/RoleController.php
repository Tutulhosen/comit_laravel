<?php

namespace App\Http\Controllers\admin;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * show role page
     */
    public function index()
    {
        $permission_data= Permission::all();
        $role_data             = Role::latest()->get();
        $fun                        = 'role';
        return view('admin.user.role.index', compact('permission_data','role_data', 'fun'));
    }

        /**
     * show role page
     */
    public function edit($id)
    {
        $permission_data= Permission::all();
        $role_data             = Role::latest()->get();
        $role_id                  = Role::findOrfail($id);
        $fun                        = 'edit';
        return view('admin.user.role.index', compact('permission_data','role_data','fun', 'role_id'));
    }

    /**
     * store the role
     */
    public function store(Request $request)
    {
        //validation

        $this->validate($request, [
            'name'               => 'required|unique:roles',
            'per'                => 'required',
            
        ]);

        //store data

        Role::create([
            'name'                 => $request->name,
            'slug'                 => Str::slug($request->name),
            'permission'           =>json_encode($request->per)
        ]);
        return redirect()->route('admin.role')->with('success', 'Successfully add a new role');



    }

    /**
     * delete a role
     */
    public function destroy($id)
    {
        $delete_id= Role::findOrFail($id);
        $delete_id->delete();
        return back()->with('success-mid', 'The role is deleted');
    }

    /**
     * update role data
     */

public function update(Request $request, $id)
{
    $update_id = Role::findOrFail($id);
    if ($request->per) {
        $update_id->update([
            'name'                              => $request->name,
            'slug'                              => Str::slug($request->name),
            'permission'                        => json_encode($request->per),
        ]);
        return redirect()->route('admin.role')->with('success', 'successfully update the role data');
    } else {
        $update_id->update([
            'name'                              => $request->name,
            'slug'                              => Str::slug($request->name),
            'permission'                        => json_encode([]),
        ]);
        return redirect()->route('admin.role')->with('success', 'successfully update the role data');
    }
    
    
    
    
}



}
