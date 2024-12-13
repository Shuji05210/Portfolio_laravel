<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            //1
            [
                'name' => 'ユーザ 太郎',
                'email' => 'taro.sato@example.com',
                'password' => Hash::make('password123'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            //2
            [
                'name' => 'ユーザ 二郎',
                'email' => 'Jiro26@example.com',
                'password' => Hash::make('password123'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            //3
            [
                'name' => 'ユーザ 三郎',
                'email' => 'Sabu6@example.com',
                'password' => Hash::make('password123'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], 

            //4
            [
                'name' => 'ユーザ 四郎',
                'email' => '4646@example.com',
                'password' => Hash::make('password123'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            //5
            [
                'name' => '五郎',
                'email' => 'Goro56@example.com',
                'password' => Hash::make('password123'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            //6
            [
                'name' => 'ユーザ 6',
                'email' => '666@example.com',
                'password' => Hash::make('password123'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            //7
            [
                'name' => 'ユーザ 7',
                'email' => '777@example.com',
                'password' => Hash::make('password123'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            //8
            [
                'name' => 'ユーザ 8',
                'email' => '8888@example.com',
                'password' => Hash::make('password123'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            //9
            [
                'name' => 'ユーザ 花子',
                'email' => 'hanako9@example.com',
                'password' => Hash::make('password123'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            //10
            [
                'name' => 'ユーザ 10',
                'email' => 'user10@example.com',
                'password' => Hash::make('password123'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
