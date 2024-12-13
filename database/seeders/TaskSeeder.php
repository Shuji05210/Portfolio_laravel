<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TaskSeeder extends Seeder
{
    public function run()
    {
        DB::table('tasks')->insert([
            [
                'user_id' => 1,
                'category_id' => 2,
                'taskstate_id' => 3,
                'title' => 'ウェブサイトのデザイン更新',
                'description' => 'クライアントの要求に基づいて、ウェブサイトのデザインを最新のものに更新する。',
                'due_date' => Carbon::now()->addDays(5),
                'priority' => '高',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 2,
                'category_id' => 1,
                'taskstate_id' => 2,
                'title' => 'データベースのバックアップ',
                'description' => '毎週のデータベースバックアップを実施し、安全な場所に保存する。',
                'due_date' => Carbon::now()->addDays(5),
                'priority' => '中',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 3,
                'category_id' => 8,
                'taskstate_id' => 1,
                'title' => '新機能のテスト',
                'description' => '新しく追加した機能のバグをテストし、問題があれば修正する。',
                'due_date' => Carbon::now()->addDays(5),
                'priority' => '低',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 4,
                'category_id' => 2,
                'taskstate_id' => 4,
                'title' => 'システムのアップデート',
                'description' => '最新のセキュリティアップデートを適用し、システムを安定させる。',
                'due_date' => Carbon::now()->addDays(5),
                'priority' => '高',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 5,
                'category_id' => 2,
                'taskstate_id' => 3,
                'title' => '顧客対応',
                'description' => '顧客からの問い合わせに対応し、解決策を提案する。',
                'due_date' => Carbon::now()->addDays(5),
                'priority' => '中',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 6,
                'category_id' => 4,
                'taskstate_id' => 2,
                'title' => 'コードレビュー',
                'description' => 'チームメンバーのコードをレビューし、改善点を指摘する。',
                'due_date' => Carbon::now()->addDays(5),
                'priority' => '低',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 7,
                'category_id' => 3,
                'taskstate_id' => 4,
                'title' => '友達とカフェに行く',
                'description' => '友達とカフェでお茶をする予定。',
                'due_date' => Carbon::now()->addDays(5),
                'priority' => '高',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 8,
                'category_id' => 2,
                'taskstate_id' => 4,
                'title' => 'サーバーログの確認',
                'description' => 'サーバーのエラーログを確認し、潜在的な問題を特定する。',
                'due_date' => Carbon::now()->addDays(5),
                'priority' => '中',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 2,
                'category_id' => 6,
                'taskstate_id' => 3,
                'title' => '部屋の掃除',
                'description' => 'リビングとキッチンの掃除をする。',
                'due_date' => Carbon::now()->addDays(5),
                'priority' => '中',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 10,
                'category_id' => 3,
                'taskstate_id' => 4,
                'title' => '映画鑑賞',
                'description' => '最新のアクション映画を観に行く。',
                'due_date' => Carbon::now()->addDays(5),
                'priority' => '低',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
