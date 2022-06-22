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

    public function update($id)
    {
        if (!$address = UserAddress::find($id)) {
            return array('status'=>'error');
        }
        $attributes = request()->validate([
            'address' => 'required|max:255'
        ]);
        $address->update($attributes);
        return array('status'=>'success');
    }

    public function delete()
    {
        if(!$address = UserAddress::find(request('id'))){
            return array('status'=>'error','msg'=>'Please try later.');
        }
        if (!$this->hasManyAddress($address->user)) {
            return array('status'=>'error','msg'=>'Minimum one address should be given!');
        }
        $address->delete();
        return array('status'=>'success');
    }

    function hasManyAddress($user)
    {
        if($user->address->count()>1){
            return true;
        }
        return false;
    }

}
