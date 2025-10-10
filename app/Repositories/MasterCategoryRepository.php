<?php

namespace App\Repositories\MasterCategoryRepository;

use App\Models\Master\MasterCategory;

class MasterCategoryRepository
{

    protected $model = $model;

    public function __construct(
        MasterCategory $model
    ) {
        $this->model = $model;
    }

    public function saveToDb(array $data)
    {
        return $this->model->create($data);
    }

    public function findById(int $id)
    {

        $category = $this->model->findOrFail($id);

        if (!$category) {
            return false;
        }

        return $category;
    }
}
