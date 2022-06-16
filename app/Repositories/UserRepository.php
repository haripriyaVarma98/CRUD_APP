<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public $user;

    function __construct() {
	    $this->user = new User();
    }

    public function getAllUsers($users)
    {
        $data = array();
        foreach ($users as $user) {
            $data[] = $this->generateUserDataWithFirstAddress($user);
        }
        return $data;
    }

    public function generateUserDataWithFirstAddress($user)
    {
        $data = [];
        $data['name'] = $user->name;
        $data['username'] = $user->username;
        $data['email'] = $user->email;
        $data['address'] = $user->address->count() ? $user->address->first()->address : '-';

        return $data;
    }
    
}