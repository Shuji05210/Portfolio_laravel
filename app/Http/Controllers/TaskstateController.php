<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TaskState;

class TaskstateController extends Controller
{
    public function index()
    {
        return Taskstate::all();
        //テーブルの内容すべてを表示する
    }
}
