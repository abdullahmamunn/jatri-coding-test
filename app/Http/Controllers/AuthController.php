<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\AuthRepository;

class AuthController extends Controller
{
    private $user;

    public function __construct(AuthRepository $user)
    {
        $this->user = $user;
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
        ]);
         
        return $this->user->userRegister($request->all());
        
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
        
        return $this->user->userLogin($request->all());
        
    }

    public function logout(Request $request) {

        return $this->user->userLogout($request);
    }

    public function getUsers()
    {
        return User::all();
    }
}