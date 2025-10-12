<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Facades\Auth;

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

    private function redirectToDashboard($user = null)
    {
        $user = $user ?: Auth::user();

        if(!$user){
            return redirect()->route('login');
        }

        // Role based roueting
        $route = match($user->role){
            'SA' =>'student-advisor.dashboard',
            'ADMIN' => 'admin.dashboard',
            'TEACHER' => 'teacher.dashboard',
            'MANAGER' => 'manager.dashboard'
        };
        return redirect()->route($route);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        try {
            $user = $this->service->checkLogin($request->email, $request->password);
            Auth::login($user);
            $this->service->updateLoginStatus($user);
            return $this->redirectToDashboard($user)
            ->with('success', 'Welcome Back!, '.$user->username.'!');

        } catch (Exception $err) {
            return redirect()->back()
            ->withInput($request->only('login'))
            ->withErrors(['login' => 'Login failed with error -> ',$err->getMessage()]);
        }
    }
}
