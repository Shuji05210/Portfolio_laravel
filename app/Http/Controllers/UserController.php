<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

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

}
