<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show()
    {
        return view('Category.list',['categories'=>Category::get()]);
    }

    public function store() {
        $attributes = request()->validate([
            'name' => 'required|max:255'
        ]);

        if(!$category = Category::create($attributes))
            return ['status'=>'error'];

        return ['status'=>'success','id'=>$category->id];
    }

    public function update() {
        request()->validate(['name' => 'required|max:255']);
        if(!$category = Category::find(request('id')))
            return ['status'=>'error'];
        $category->name = request('name') ?? '-';
        if(!$category->update())
            return ['status'=>'error'];
        return ['status'=>'success'];
    }

    public function destroy()
    {
        $id  = request('id');
        if (!$id) {
            return ['status'=>'error'];
        }
        if (!Category::whereId($id)->delete()) {
            return ['status'=>'error'];
        }
        return ['status'=>'success'];
    }
}
