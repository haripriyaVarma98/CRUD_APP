<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
    public function store()
    {
        if(request()->validate(['requested_date' => 'required'])) {
            $attributes['user_id'] = request('user_id');
            $attributes['requested_date'] = date('Y-m-d', strtotime(request('requested_date')));
            
            if(!LeaveRequest::create($attributes))
                return ['status'=>'error'];

            return ['status'=>'success'];
        }
    }
}
