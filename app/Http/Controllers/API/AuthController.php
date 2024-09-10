<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:191',
            'last_name' => 'required|string|max:191',
            'gender' => 'required|string|max:191',
            'phone' => 'required|string|max:191',
            'email' => 'required|email|max:191|unique:users,email',
            'department_id' => 'required|string|max:191',
            'password' => 'required|string|max:191|confirmed'
        ]);

        $user = User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'gender' => $data['gender'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'department_id' => $data['department_id'],
            'password' => Hash::make($data['password'])
        ]);

        $token = $user->createToken('leaveRegister')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 200);
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response(['message' => 'logged out successfully'], 200);
    }


    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
        //Check email
        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response(['message' => 'Invalid Credentials'], 401);
        }

        $token = $user->createToken('leaveLogin')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 200);
    }

}
