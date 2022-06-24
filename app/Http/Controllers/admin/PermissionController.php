<?php

namespace App\Http\Controllers\admin;

use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    /**
     * show the permission page
     */
    public function index()
    {
        $data= Permission::latest()->get();
        return view('admin.user.permission.index', [
            'permission_data'    => $data,
            'form_type'                => 'add',
        ]);
    }

     /**
     * show the permission page
     */
    public function edit($id)
    {
        $data= Permission::latest()->get();
        $date_id= Permission::findOrFail($id);
        return view('admin.user.permission.index', [
            'permission_data'    => $data,
            'form_type'                => 'edit',
            'permission_id'         =>$date_id,
        ]);
    }

    /**
     * data store
     */
 public function store(Request $request)
 {

     //validation

     $this->validate($request, [
         'name'         => 'required|unique:permissions',
     ]);

     //store data
     Permission::create([
         'name'         => $request->name,
         'slug'         => Str::slug($request->name),
     ]);
     return redirect()->route('admin.permission')->with('success', 'successfully add a new permission');



 }

 /**
  * delete a permission
  */
  public function destroy($id)
  {
      $data= Permission::findOrFail($id);
      $data->delete();
      return back()->with('success-mid', 'The permission is deleted');
  }


      /**
     * edit data
     */
 public function update(Request $request, $id)
 {



     //update data

     $update_id=Permission::findOrFail($id);
     $update_id->update([
         'name'         => $request->name,
         'slug'            => Str::slug($request->name)
     ]);
     return redirect()->route('admin.permission')->with('success', 'successfully update the data');



 }




}
