<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');             // ユーザーID (外部キー)
            $table->foreignId('category_id');         // カテゴリーID (外部キー)
            $table->foreignId('taskstate_id');        // ステータスID (外部キー)
            $table->string('title');                  // タスク名
            $table->text('description')->nullable();  // タスクの詳細
            $table->date('due_date')->nullable();     // 期限
            $table->string('priority');               // このタスクの重要度
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
