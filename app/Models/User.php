<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; //ユーザ認証用 Modelの拡張
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasFactory, HasApiTokens;  // HasApiTokensを使う

    protected $fillable = [
        'name', 
        'email',
        'password'
    ];

    // タスクとのリレーション
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    
}
