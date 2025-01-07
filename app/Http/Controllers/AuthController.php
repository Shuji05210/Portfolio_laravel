<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // 新規ユーザー登録
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => '入力が無効です'], 400);
        }

        // ユーザー作成
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // パスワードはハッシュ化
        ]);

        // ユーザーのトークン発行
        $token = $user->createToken('YourAppName')->plainTextToken;

        return response()->json(['token' => $token], 201);
    }

    // ログイン
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['ログイン情報が無効です'],
            ]);
        }

        // ログイン後にトークンを発行
        $token = $user->createToken('YourAppName')->plainTextToken;

        return response()->json(['token' => $token]);
    }

    // 認証されたユーザー情報の取得
    public function user(Request $request)
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
