<?php
namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    public $repository;

    public function __construct()
    {
        $this->repository = new UserRepository;
    }

    public static function getInputData()
    {
        $formData = json_decode(request('formData'));
        $inputData = [];
        $inputData['search'] = request('search')['value'] ?? '';
        // $inputData['company_id'] = request('company_id') ?? '';
        $inputData['addressType'] = $formData->addressFilter ?? false;
        $inputData['company_ids'] = $formData->companyFilter ?? [];
        $inputData['start'] = request('start') ?? 0;
        $inputData['limit'] = request('length') ?? -1;
        return $inputData;
    }

    public function filterUsers($filter)
    {
        $users = $this->repository->getAllUsers();
        $users = $this->repository->filterUserWithSearchData($users, $filter['search']);
        $users = $this->repository->filterUserWithCompanyIds($users, $filter['company_ids']);
        $users = $this->getUserWithAddressFilter($users, $filter['addressType']);
        $users = $this->repository->paginate($users, $filter['limit'], $filter['start']);
        $users = $users->get();
        return $users;
    }

    public function getUserWithAddressFilter($users, $addressType)
    {
        if ($addressType == 'has-address') {
            return $this->repository->getUserWithAddress($users);
        }
        if ($addressType == 'single-address') {
            return $this->repository->getUserWithSingleAddress($users);
        }
        if ($addressType == 'multi-address') {
            return $this->repository->getUserWithMultipleAddress($users);
        }
        if ($addressType == 'no-address') {
            return $this->repository->getUserWithNoAddress($users);
        }
        return $users;
    }

    public function getOutputData($users)
    {
        $finalData = [];
        foreach ($users as $user) {
            $data = [];
            $data['name'] = $user->name;
            $data['username'] = $user->username;
            $data['email'] = $user->email;
            $data['address'] = $user->address->count() ? $user->address->first()->address : '-';
            $data['company'] = $user->company->name;
            $finalData[] = $data;
        }
        return $finalData;
    }
}
