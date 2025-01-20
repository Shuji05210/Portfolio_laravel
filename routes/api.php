<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskStateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/




//ログイン回り 2025/1/7(火)実装
// ユーザー登録
Route::post('/users', [UserController::class, 'register']);

//ユーザ情報取得
Route::get('/users', [UserController::class, 'index']);

//ユーザ情報更新
Route::put('/users/{id}', [UserController::class, 'update']);

//ユーザの削除
Route::delete('/users/{id}', [UserController::class, 'destroy']);

// ログイン
Route::post('/login', [AuthController::class, 'login']);

// 認証済みユーザーの情報取得
Route::middleware('auth:sanctum')->get('user', [AuthController::class, 'user']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ログアウト
Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);



//APIでreactに渡す api/tasksにアクセス
Route::get('/tasks', [TaskController::class, 'index']);

//送信
Route::post('/tasks', [TaskController::class, 'store']); 

// 編集と更新機能 11/29(金)追加
Route::put('/tasks/{id}', [TaskController::class, 'update']);

//個別表示機能
Route::get('tasks/{task}', [TaskController::class, 'show']);


//特定のユーザーのみのデータを指定して表示させる
// {id}は引数
Route::get('/userview/{id}',[TaskController::class, 'getTasksByUserId']);


//削除機能 12/4(水)
Route::delete('/delete/{id}', [TaskController::class, 'delete']);



//users 一覧
Route::get('/users',[UserController::class, 'index']);

//usersテーブル 個別表示
Route::get('/user/{id}',[UserController::class, 'getUserById']);


//category
Route::get('/category', [CategoryController::class, 'index']);

//taskstate
Route::get('/state', [TaskStateController::class,'index']);
