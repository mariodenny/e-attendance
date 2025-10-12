<?php

namespace App\Services;

use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AuthService
{

    protected $repository;


    public function __construct(
        AuthRepository $repository
    ) {
        $this->repository = $repository;
    }

    public function checkLogin($email, $password)
    {
        $user = $this->repository->findUserByEmail($email);

        if (!$user) {
            throw new HttpException(404, "User not found!");
        }
        // compare password

        if (!Hash::check($password, $user->password)) {
            throw new HttpException(401, 'Invalid password');
        }

        return $user;
    }

    public function updateLoginStatus($user)
    {
        return $this->repository->update($user->id, [
            'last_login_at' => now('Asia/Jakarta'),
            'ip_address' => request()->ip(),
            'user_agent' => Request::userAgent()
        ]);
    }
}
