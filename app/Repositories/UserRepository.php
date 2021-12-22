<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Impl\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function create($data)
    {
        $this->model-$this->create($data);
    }

    public function getPostOfUser($userId)
    {
        $user = $this->getById($userId);
        return $user->posts;
    }
}
