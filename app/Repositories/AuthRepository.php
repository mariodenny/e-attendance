<?php

namespace App\Repositories;

use App\Models\User;

class AuthRepository
{

    protected $userModel;

    public function __construct(
        User $userModel
    ) {
        $this->userModel = $userModel;
    }

    public function findUserByEmail(string $email)
    {
        return $this->userModel->where('email', $email)->first();
    }

    public function update($id, $data)
    {
        return $this->userModel->where('id', $id)->update($data);
    }
}
