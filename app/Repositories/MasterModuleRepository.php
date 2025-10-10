<?php

namespace App\Repositories\MasterModuleRepository;

use App\Models\Master\MasterModule;

class MasterModuleRepository
{
    private $model;

    public function __construct(MasterModule $model)
    {
        $this->model = $model;
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function findById($id)
    {
        return $this->model->with('category')->find($id);
    }

    public function updateStatus($id, $status)
    {
        return $this->model->where('id', $id)->update([
            'is_active' => $status
        ]);
    }

    public function update($id, $data)
    {
        return $this->model->where('id', $id)->update($data);
    }

    public function getAllActives()
    {
        return $this->model->where('is_active', true)->with('category')->get();
    }

    public function getAllModules()
    {
        return $this->model->with('category')->get();
    }

    public function delete($id)
    {
        return $this->model->where('id', $id)->delete();
    }
}
