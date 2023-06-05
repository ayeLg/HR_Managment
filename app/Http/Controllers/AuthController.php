<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request) {

        $validated = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        if(Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])){
            $user = Auth::user();
            $success['token'] = $user->createToken($user->email)->plainTextToken;
            $success['name'] = $user->name;
            return $this->successReqonse($success, "login Successfully");
        }
        return $this->errorResponse("Login Failed");
    }

    public function register(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string',
            'role' => 'required|integer'

        ]);
        $validated['password '] = bcrypt($validated['password']);
        $user = User::create($validated);
        $success['token'] = $user->createToken($user->email)->plainTextToken;
        $success['name'] = $user->name;

        return $this->successReqonse($success, "Regiter Successfully!");
    }
}
