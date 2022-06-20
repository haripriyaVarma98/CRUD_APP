<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $service;

    public function __construct()
    {
        $this->service = new UserService();
    }

    public function create()
    {
        return view('user.create', ['companies' => Company::get()]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:4|max:8',
            'username' => 'required|min:4|max:10|unique:users,username',
            'company_id' => 'required',
        ]);

        if ($user = User::create($attributes)) {
            auth()->login($user);

            return view('user.home', [
                'details' => $user,
            ]);
        }
    }

    public function show(){
        return view('user.list',['companies'=>Company::get()]);
    }

    public function data()
    {
        $filter = $this->service->getInputData();
        $users = $this->service->filterUsers($filter);
        $data = $this->service->getOutputData($users);
        
        $totalCount = User::count();
        $filterCount = $data ? count($data) : $totalCount;

        $result = [
            "draw"=> request('draw'),
            "recordsTotal"=> $totalCount,
            "recordsFiltered"=> $filterCount,
            "data"=> $data
        ];
        echo json_encode($result);
    }
}
