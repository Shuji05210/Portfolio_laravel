<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    
    // ログイン
    public function login(Request $request)
    {
        $request->validate([
            'email' =>
            'required|string|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['ログイン情報が無効です'],
            ]);
        }

        // ログイン後にトークンを発行
        $token = $user->createToken('Login')->plainTextToken;

        return response()->json(['token' => $token]);
    }


    // 認証されたユーザー情報の取得
    public function userinfo(Request $request)
    {
        return response()->json($request->user());
    }
    
    // ログアウト
    public function logout(Request $request)
    {
        // ユーザーのトークンを削除
        $request->user()->tokens->each(function ($token) {
            $token->delete();
        });

        return response()->json(['message' => 'ログアウトしました']);
    }
}
