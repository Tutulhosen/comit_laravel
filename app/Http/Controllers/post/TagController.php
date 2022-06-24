<?php

namespace App\Http\Controllers\post;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
   /**
    * view post tag page
    */
    public function index()
    {
        $tag_data=Tag::latest()->get();
        $type    = 'add';
        return view('admin.post.tag.index', compact('tag_data','type'));
    }

    /**
    * view post tag edit page
    */
    public function edit($id)
    {
        $tag_id= Tag::findOrFail($id);
        $tag_data=Tag::latest()->get();
        $type    = 'edit';
        return view('admin.post.tag.index', compact('tag_data','type','tag_id'));
    }


    /**
     * c
     * reate a tag data
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required|unique:tags'
        ]);
        Tag::create([
            'name'          => $request->name,
            'slug'          => Str::slug($request->name)
        ]);
        return back()->with('success', 'successfully add a Tag');
    }

    /**
     * delete a tag data
     */
    public function destroy($id)
    {
        $delete_id = Tag::findOrFail($id);
        $delete_id->delete();
        return back()->with('success-mid', 'Delete the Tag');
    }

    /**
     * update tag data
     */
    public function update(Request $request, $id)
    {
        $update_data =Tag::findOrFail($id);

        $this->validate($request, [
            'name'          => 'required'
        ]);
        $update_data->update([
            'name'           =>$request->name,
            'slug'           =>Str::slug($request->name)
        ]);
        return redirect()->route('post.tag')->with('success-mid', 'Successfully update tag data');
        
    }




}
