<?php

namespace App\Http\Controllers;

use App\Models\UserAddress;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function create()
    {
        return view('address.create');
    }
    
    public function edit()
    {
        $address = UserAddress::find(request('id'));
        return view('address.create',['data'=>$address]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'address' => 'required|max:255'
        ]);

        $attributes['user_id'] = request('user_id');

        if(!UserAddress::create($attributes))
            return ['status'=>'error'];

        return ['status'=>'success'];
    }

    public function delete()
    {
        UserAddress::find(request('id'))->delete();
        return back();
    }

}
