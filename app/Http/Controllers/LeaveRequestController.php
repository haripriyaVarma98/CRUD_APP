<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use App\Models\User;
use App\Services\LeaveService;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
    public $service;

    public function __construct() {
        $this->service = new LeaveService;
    }
    public function store()
    {
        if(request()->validate(['requested_date' => 'required'])) {
            $attributes['user_id'] = request('user_id');
            $attributes['requested_date'] = date('Y-m-d', strtotime(request('requested_date')));

            if (!$this->service->checkLeaveAvailability(User::find($attributes['user_id']))) {
                return ['status'=>'error','msg'=>'Insufficient leave balance!'];
            }
            if(!LeaveRequest::create($attributes))
                return ['status'=>'error'];

            return ['status'=>'success'];
        }
    }

    public function show()
    {
        return view('leaveRequest.list',['data' => LeaveRequest::get()]);
    }

    public function approve()
    {
        $id = request('id');
        if (!$leaveRqst = LeaveRequest::find($id)) {
            return ['status'=>'error'];
        }
        $result  = $this->service->approveLeave($leaveRqst);
        return $result;
    }

    public function reject()
    {
        $id = request('id');
        $leaveRqst = LeaveRequest::find($id);
        $result  = $this->service->rejectLeave($leaveRqst);
        return $result;
    }

    public function massApproveOrReject()
    {
        $requests = request('requests');
        $type = request('type');
        $result  = $this->service->massApproveOrReject($requests, $type);
        return $result;
    }
}
