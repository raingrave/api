<?php

namespace App\Repositories;

use App\Entities\User;
use App\Repositories\Contracts\UserRepositoryContract;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository extends Repository implements UserRepositoryContract
{
    /**
     * UserRepository constructor.
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}
