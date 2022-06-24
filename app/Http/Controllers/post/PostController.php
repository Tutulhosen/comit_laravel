<?php

namespace App\Http\Controllers\post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * show post page
     */
    public function index()
    {
        return view('admin.post.index');
    }

    /**
     * show post create page
     */
    public function create()
    {
        $tag= Tag::all();
        $category = Category::all();
       return view('admin.post.create', compact('tag', 'category'));
    }




}
