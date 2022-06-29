<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function create()
    {
        return view('Blog.create',[
            'categories' => Category::select('id','name')->get(),
            'authors' => User::select('id','name')->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'brief' => 'required',
            'category' => 'required',
            'author' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.$request->image->extension();
        if (!$request->image->move(public_path('uploadedImages'), $imageName)) {
            return ['status'=>'error'];
        }  
        $attributes ['title'] = $request->input('title');
        $attributes ['body'] = $request->input('content');
        $attributes ['brief'] = $request->input('brief');
        $attributes ['category_id'] = $request->input('category');
        $attributes ['user_id'] = $request->input('author');
        $attributes ['image_name'] = $imageName;
        $attributes ['slug'] = str_replace(' ','-',$request->input('title'));
        if (!Blog::create($attributes)) {
            return ['status'=>'error'];
        }
        return ['status'=>'success'];
    }

    public function show()
    {
        return view('Blog.list',['blogs'=>Blog::latest()->paginate(6)]);
    }

    public function list()
    {
        return view('Blog.table',[
            'blogs'=>Blog::latest()->with('author','comments','category')->paginate(6)
        ]);
    }

    public function view(Blog $blog)
    {
        return view('Blog.content',['blog'=>$blog,'comments' => $blog->comments->sortByDesc('created_at')]);
    }
}
