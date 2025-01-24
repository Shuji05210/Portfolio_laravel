<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // ログイン
    public function login(Request $request)
    {
        // バリデーション
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        // ユーザー情報を取得
        $user = User::where('email', $request->email)->first();

        // ユーザーが存在しない、またはパスワードが一致しない場合
        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['ログイン情報が無効です'],
            ]);
        }

        // トークンを発行
        $token = $user->createToken('Login')->plainTextToken;

        // 成功した場合、トークンを返す
        return response()->json(['token' => $token], 200);
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
