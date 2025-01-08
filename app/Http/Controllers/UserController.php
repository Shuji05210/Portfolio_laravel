<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function index()
    {
        return User::all();
        //Userテーブルの内容すべてを表示する
    }

    //IDに対応するものだけを表示 個別表示機能
    public function getUserById($id)
    {
        $view = User::find($id);

        return response()->json($view);

        if (!$view) {
            return response()->json(['message' => 'データが見つかりません'], 404);
        }
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',  
            'email'    => 'required|string|unique:users,email',  
            'password' => 'required|string|min:6',
        ]);

        //バリデーションに成功したデータをデータベース上に作成する
        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => $validated['password'],
        ]);

        //レスポンスとしてjson形式で値を返す
        return response()->json([
            'user' => $user,  // 作成したタスクデータを返す
            'message' => '送信成功した',
        ], 200);

        return response()->json(['token' => $token], 201);
    }

    
}
