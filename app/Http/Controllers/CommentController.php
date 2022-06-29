<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store()
    {
        $attributes = request()->validate([
            'comment' => 'required|min:2|max:255'
        ]);
        $attributes['user_id'] = auth()->user()->id;
        $attributes['blog_id'] = request('blog_id');
        if (!Comment::create($attributes)) {
            return array('status'=>'error');
        }
        return array('status'=>'success');
    }
}
