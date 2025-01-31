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
        $users = User::all();
        //Userテーブルの内容すべてを表示する
        return response()->json($users);
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,',
            'password' => 'required|string|min:6',
        ]);

        //バリデーションに成功した場合 パスワードをハッシュ化(特定できないようにしておく)
        $validated['password'] = Hash::make($validated['password']);

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

    // ユーザーを削除
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'ユーザーが見つかりません'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'ユーザーが削除されました']);
    }

    //ユーザの編集
    public function update(Request $request, $id)
    {
        //編集するユーザを特定する idを引数として
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'ユーザーが見つかりません'], 404);
        }


        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6',
        ]);

        // パスワードが提供されていない場合は更新しない
        if (empty($validated['password'])) {
            unset($validated['password']);
        } else {
            // パスワードが提供されている場合はハッシュ化
            $validated['password'] = bcrypt($validated['password']);
        }

        $user->update($validated);

        return response()->json($user);
    }

    //UserテーブルのIDのリストを取得させる

}
