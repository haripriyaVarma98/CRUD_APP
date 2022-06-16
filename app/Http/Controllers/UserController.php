<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $repo;

    public function __construct()
    {
        $this->repo = new UserRepository;
    }

    public function create()
    {
        return view('user.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:4|max:8',
            'username' => 'required|min:4|max:10|unique:users,username',
        ]);

        if ($user = User::create($attributes)) {
            auth()->login($user);

            return view('user.home', [
                'details' => $user,
            ]);
        }
    }

    public function data()
    {
        $users = User::latest();
        $start = request('start');
        $limit = request('length');
        if ($limit != -1) {
            $users = $users->offset($start)
            ->limit($limit);
        }

        $search = request('search')['value'];
        $users = $users->filter($search)->get();

        $data = $this->repo->getAllUsers($users);

        $totalCount = User::count();
        $filterCount = $search ? count($data) : $totalCount;

        $result = [
            "draw"=> request('draw'),
            "recordsTotal"=> $totalCount,
            "recordsFiltered"=> $filterCount,
            "data"=> $data
        ];
        echo json_encode($result);
    }
}
