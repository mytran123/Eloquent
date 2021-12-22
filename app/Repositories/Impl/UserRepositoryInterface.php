<?php

namespace App\Repositories\Impl;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function create($data);

    public function getPostOfUser($userId);
}
