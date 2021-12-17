<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthRepository implements AuthInterface
{
    public function userRegister($data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
            'success' => 'Congratulations new user!'
        ];

        return response($response, 201);
    }

    public function userLogin($data)
    {
        //Check email
        $user = User::where('email', $data['email'])->first();

        // Check password
        if(!$user || !Hash::check($data['password'], $user->password)) {
            return response([
                'message' => 'Sorry! Credentials does not match.'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'seccess' => 'Welcome Mr. '.$user->name,
            'user' => $user,
            'token' => $token,
            
        ];

        return response($response, 200);
    }

    public function userLogout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }
}
?>