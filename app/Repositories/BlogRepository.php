<?php

namespace App\Repositories;

use App\Models\Blog;

class BlogRepository
{
    public function getAllBlogs()
    {
        $blogs = Blog::query()
        ->select('id','title','slug','category_id','user_id')
        ->with(['author:id,name','category:id,name'])
        ->latest();
        return $blogs;
    }

    public function filterBlogWithTitle($blogs, $search)
    {
        $blogs->when($search ?? false, fn ($query,$search) =>
            $query->where(fn ($query) =>
                $query->where('title', 'like', '%'.$search.'%')
            )
        );
        return $blogs;
    }
    
    public function filterBlogWithCategory($blogs, $category_id)
    {
        $blogs->when($category_id ?? false, fn ($query, $category_id) =>
            $query->where('category_id',$category_id)
        );
        return $blogs;
    }

    public function filterBlogWithAuthor($blogs, $user_id)
    {
        $blogs->when($user_id ?? false, fn ($query, $user_id) =>
            $query->where('user_id',$user_id)
        );
        return $blogs;
    }

    public function filterBlogWithComments($blogs, $count)
    {
        if ($count!=NULL) {
            $blogs->has('comments','=',$count);
        }
        return $blogs;
    }
}
