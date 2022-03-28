<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected function respond($data, $status = 200, $headers = [])
    {
        return parent::respond([
            'access_token' => $data,
            'token_type' => 'Bearer',
        ]);
    }

    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);
        $token = $user->createToken('auth_token')->plainTextToken;
        return $this->respond($token, 201);
    }

    public function login(LoginRequest $request)
    {
        $validated = $request->validated();
        $user = User::where('email', $validated['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;
        return $this->respond($token);
    }
}
