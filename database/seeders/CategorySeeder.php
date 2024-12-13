<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['genre' => '個人的'],    // 1
            ['genre' => '仕事'],      // 2
            ['genre' => '娯楽'],      // 3
            ['genre' => '勉強'],      // 4
            ['genre' => '買い物'],    // 5
            ['genre' => '家事'],      // 6
            ['genre' => '旅行'],      // 7
            ['genre' => 'その他'],    // 8
            
        ]);
    }
}
