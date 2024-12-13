<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //P294
        DB::table('taskstates')->insert([
            [
                'state' => '未着手',
                'message' => 'タスクは未着手',
            ],     // 1

            [
                'state' => '進行中',
                'message' => 'タスクは進行中',
            ],     // 2

            [
                'state' => '完了',
                'message' => 'タスクは完了',
            ],     // 3

            [
                'state' => '保留中',
                'message' => 'タスクは保留中',
            ],     // 4

            [
                'state' => 'キャンセル',
                'message' => 'タスクはキャンセルされた',
            ],     // 5

        ]);
    }
}
