<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $service;

    public function __construct(
        AuthService $service
    ) {
        $this->service = $service;
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
    }
}
