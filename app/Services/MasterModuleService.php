<?php

namespace App\Services\MasterModuleService;

use App\Repositories\MasterModuleRepository\MasterModuleRepository;
use Error;
use Exception;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\HttpException;

class MasterModuleService
{
    private $repository;

    public function __construct(
        MasterModuleRepository $repository
    ) {
        $this->repository = $repository;
    }

    public function getActiveModules()
    {
        return $this->repository->getAllActives();
    }

    public function getAllModules()
    {
        return $this->repository->getAllModules();
    }

    public function create(array $data)
    {
        $module = $this->repository->create($data);

        if (!$module) {
            throw new HttpException(400, 'Create Module Failed');
        }

        return $module;
    }

    public function update(int $id, array $data)
    {
        $module = $this->repository->findById($id);

        if ($module) {
            throw new HttpException(404, 'Module not found!');
        }

        try {
            return $this->repository->update($id, $data);
        } catch (Exception $error) {
            throw new HttpException(500, "Something went wrong ", $error);
        }
    }

    public function updateStatus(int $id, $status)
    {
        $activeModule = $this->repository->getAllActives();

        if (!$activeModule) {
            throw new HttpException(404, 'Active module not found!');
        }

        try {
            return $this->repository->updateStatus($id, $status);
        } catch (Exception $error) {
            throw new HttpException(500, "Something went wrong ", $error);
        }
    }
}
