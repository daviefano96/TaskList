<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\UseRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    protected $UserService;

    public function __construct(UserService $UserService)
    {
        $this->UserService = $UserService;
    }

    public function signup(UseRequest $request)
    {
        $this->UserService->signup($request->validated());
 
        return redirect('/');
    }

    public function login(LoginRequest $request)
    {
        $result =  $this->UserService->login($request->validated());

        if($result==true){
            return redirect()->intended('dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }



    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
