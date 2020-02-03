<?php

namespace App\Services;

use App\Entities\User;
use App\Services\Contracts\UserServiceContract;

class UserService implements UserServiceContract
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAll()
    {
        return $this->user->all();
    }
}
