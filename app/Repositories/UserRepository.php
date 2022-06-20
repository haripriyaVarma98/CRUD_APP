<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function getAllUsers()
    {
        $users = User::latest();
        return $users;
    }

    public function paginate($data, $limit, $offset)
    {
        if ($limit != -1) {
            $data = $data->offset($offset)
            ->limit($limit);
        }
        return $data;
    }

    public function filterUserWithSearchData($users, $search)
    {
        $users->when($search ?? false, fn ($query,$search) =>
            $query->where(fn ($query) =>
                $query->where('name', 'like', '%'.$search.'%')
                ->orWhere('username', 'like', '%'.$search.'%')
                ->orWhere('email', 'like', '%'.$search.'%')
                ->orWhereHas('address', fn ($query)=>
                    $query->where('address', 'like', '%'.$search.'%')
                )
            )
        );
        return $users;
    }
    
    public function filterUserWithCompanyIds($users, $company_ids)
    {
        $users->when($company_ids ?? false, fn ($query, $company_ids) =>
            $query->whereIn('company_id',is_array($company_ids) ? $company_ids : array($company_ids))
        );
        return $users;
    }

    public function getUserWithAddress($users)
    {
        $usersWithAddress = $users->whereHas('address');
        return $usersWithAddress;
    }

    public function getUserWithSingleAddress($users)
    {
        $usersWithSingleAddress = $users->withCount('address')
            ->having('address_count', '=', 1);
        return $usersWithSingleAddress;
    }

    public function getUserWithMultipleAddress($users)
    {
        $usersWithMultipleAddress = $users->has('address','>',1);
        return $usersWithMultipleAddress;
    }

    public function getUserWithNoAddress($users)
    {
        $usersWithNoAddress = $users->has('address','=',0);
        return $usersWithNoAddress;
    }
}
