<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $validated = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            $user = Auth::user();
            $success['token'] = $user->createToken($user->email)->plainTextToken;
            $success['name'] = $user->name;
            return $this->successResponse($success, "login Successfully");
        }
        return $this->errorResponse("Login Failed");
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string',
            'photo' => 'required'
        ]);

        $validated['password '] = bcrypt($validated['password']);
        $image = $validated['photo'];
        $path  = Storage::disk('public_uploads')->put('/medias/images', $image);
        $validated['photo'] = $path;

        $user = Admin::create($validated);
        $success['token'] = $user->createToken($user->email)->plainTextToken;
        $success['name'] = $user->name;

        return $this->successResponse($success, "Regiter Successfully!");
    }
}
