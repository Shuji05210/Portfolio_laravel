<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'category_id',
        'taskstate_id',
        'title',
        'description',
        'due_date',
        'priority',
    ];

    // ユーザーとのリレーション
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // ステータスとのリレーション
    public function taskstate()
    {
        //1対多のリレーション belongsTo()
        return $this->belongsTo(Taskstate::class, 'taskstate_id', 'id');
    }

    // カテゴリとのリレーション
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
