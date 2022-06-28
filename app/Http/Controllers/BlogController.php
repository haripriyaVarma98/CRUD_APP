<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function show()
    {
        return view('Blog.list',['blogs'=>Blog::latest()->paginate(6)]);
    }
    public function view(Blog $blog)
    {
        return view('Blog.content',['blog'=>$blog]);
    }
}
