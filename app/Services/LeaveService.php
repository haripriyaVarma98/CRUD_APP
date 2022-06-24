<?php
namespace App\Services;

use App\Models\LeaveRequest;

class LeaveService
{
    public function approveLeave($leaveRqst)
    {
        $user = $leaveRqst->user;
        $user->available_leave_days -= 1;
        if($user->update()){
            $leaveRqst->delete();
            return ['status'=>'success'];
        }
        return ['status'=>'error'];
    }

    public function rejectLeave($leaveRqst)
    {
        if($leaveRqst?->delete())
            return ['status'=>'success'];
        return ['status'=>'error'];
    }

    public function massApproveOrReject($requests, $type)
    {
        foreach ($requests as $id) {
            $request = LeaveRequest::find($id);
            $result = $type=='approve' ? $this->approveLeave($request): $this->rejectLeave($request);
            if($result['status']=='error') {
                return ['status'=>'error'];
            }
        }
        return ['status'=>'success'];
    }

    public function checkLeaveAvailability($user)
    {
        if ($user?->available_leave_days < 1) {
            return false;
        }
        return true;
    }
}
