<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface 
{
    public function createUser(array $userDetils) 
    {
        return User::create($userDetils);
    }
    public function getAllUser() 
    {
        return User::all(); 
    }

}