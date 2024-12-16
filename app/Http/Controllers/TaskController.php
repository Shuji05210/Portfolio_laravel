<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        //ルーティングはapi.phpで

        // 11/21 タスクテーブルの取得と categoryテーブルとtaskstateテーブルの関連する情報を含めてAPIに渡す
        $tasks = Task::with(['category', 'taskstate', 'user'])->get();

        return response()->json($tasks);
    }


    public function store(Request $request)
    {
        //バリデーション 入力された値が正しいデータ化を判別する
        $validated = $request->validate([
            'user_id'      => 'required|integer',        // 整数、usersテーブルのidが存在する '|exists:users,id'
            'category_id'  => 'required|integer|exists:categories,id',  // 整数、categoriesテーブルのidが存在する
            'taskstate_id' => 'required|integer|exists:taskstates,id',  // 整数、taskstatesテーブルのidが存在する
            'title'        => 'required|string|max:255',                // 文字列、最大255文字
            'description'  => 'nullable|string|max:500',                // 任意、最大500文字
            'due_date'     => 'nullable|date',                          // due_dateが必須
            'priority'     => 'required|in:低,中,高,未指定',            // priorityが必須 低・中・高 未指定のいずれか
        ]);

        //バリデーションに成功したデータをデータベース上に作成する
        $task = Task::create([
            'user_id'      => $validated['user_id'],
            'category_id'  => $validated['category_id'],
            'taskstate_id' => $validated['taskstate_id'],
            'title'        => $validated['title'],
            'description'  => $validated['description'],
            'due_date'     => $validated['due_date'],
            'priority'     => $validated['priority'],
        ]);

        //レスポンスとしてjson形式で値を返す
        return response()->json($task, 201);
    }


    //タスクを編集して更新する update 11/29(金)追加
    public function update(Request $request, $id)
    {
        // 指定されたIDのデータを取得
        $data = Task::find($id);

        if (!$data) {
            return response()->json(['message' => 'データが見つかりませんでした'], 404);
        }

        // リクエストから新しいデータを取得
        $data->title = $request->input('title');
        $data->description = $request->input('description');
        $data->priority = $request->input('priority');
        $data->due_date = $request->input('due_date');
        $data->category_id = $request->input('category_id');
        $data->taskstate_id = $request->input('taskstate_id');

        // 更新を保存
        $data->save();

        return response()->json(['message' => 'データ更新サレタ'],[$data]);
    }

    //Individual ユーザー個別 タスク表示機能
    public function getTasksByUserId($user_id)
    {
        $tasks = Task::with(['category', 'taskstate', 'user'])->where('user_id', $user_id)->get();

        return response()->json($tasks);

        if (!$tasks) {
            return response()->json(['message' => 'データが見つかりませんでした'], 404);
        }
    }
    
    // 削除用機能
    public function delete($id)
    {
        $item = Task::find($id);

        if (!$item) {
            return response()->json(['message' => 'タスクが存在しません'], 404);
        }

        $item->delete();
        return response()->json(['message' => 'タスクを削除しました']);
    }

    //特定のタスク部分だけを返す
    public function show(Task $task)
    {
        return $task;

        if (!$task) {
            return response()->json(['message' => 'データが見つかりませんでした'], 404);
        }
    }
}
