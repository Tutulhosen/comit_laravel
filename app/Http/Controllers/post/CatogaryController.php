<?php

namespace App\Http\Controllers\post;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatogaryController extends Controller
{
    /**
     * show category page
     */

     public function index()
     {
        $category_date= Category::latest()->get();
        $type= 'add';
        return view('admin.post.category.index',compact('category_date','type'));
     }

    /**
     * show category edit page
     */

    public function edit($id)
    {
       $category_id= Category::findOrFail($id);
       $category_date= Category::latest()->get();
       $type = 'edit';
       return view('admin.post.category.index',compact('category_date','category_id', 'type'));
    }



     /**
      * store a category
      */
      public function store(Request $request)
      {
       
        $this->validate($request, [
            'name'          =>'required|unique:categories'
        ]);

        Category::create([
            'name'          =>$request->name,
            'slug'          =>Str::slug($request->name)
        ]);
        return back()->with('success', 'successfully add a category');
        



      }

      /**
       * delete a category data
       */
      public function destroy($id)
      {
        $dalete_data= Category::findOrFail($id);
        $dalete_data->delete();
        return redirect()->route('post.category')->with('success-mid', 'Delete the category');
      }


      /**
       * update category date
       */
      public function update(Request $request, $id)
      {
        $update_id= Category::findOrFail($id);
        $update_id->update([
          'name'      => $request->name,
          'slug'      => Str::slug($request->name),
        ]);
        return redirect()->route('post.category')->with('success-mid', 'successfully update tha category');
      }




}
