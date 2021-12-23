<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Impl\CategoryRepositoryInterface;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function __construct(Category $category)
    {
        $this->model = $category;
    }
}
