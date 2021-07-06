<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'user_name' => 'minhchuan',
            'usertype_id' => 1,
            'group_id' => mt_rand(1, 4),
            'user_email' => 'admin@gmail.com',
            'user_password' => Hash::make('123456'),
            'faculty_id' => mt_rand(1, 5),
            'status' => 1,
        ]);

        DB::table('users')->insert([
            'user_name' => 'hoananh',
            'usertype_id' => 2,
            'group_id' => mt_rand(1, 4),
            'user_email' => 'trainer@gmail.com',
            'user_password' => Hash::make('123456'),
            'faculty_id' => mt_rand(1, 5),
            'status' => 1,
        ]);

        DB::table('users')->insert([
            'user_name' => 'minhhieu',
            'usertype_id' => 3,
            'group_id' => mt_rand(1, 4),
            'user_email' => 'teacher@gmail.com',
            'user_password' => Hash::make('123456'),
            'faculty_id' => mt_rand(1, 5),
            'status' => 1,
        ]);

        DB::table('users')->insert([
            'user_name' => 'thanhnguyen',
            'usertype_id' => 4,
            'group_id' => mt_rand(1, 4),
            'user_email' => 'student1@gmail.com',
            'user_password' => Hash::make('123456'),
            'faculty_id' => mt_rand(1, 5),
            'status' => 1,
        ]);

        DB::table('users')->insert([
            'user_name' => 'vanloc',
            'usertype_id' => 4,
            'group_id' => mt_rand(1, 4),
            'user_email' => 'student2@gmail.com',
            'user_password' => Hash::make('123456'),
            'faculty_id' => mt_rand(1, 5),
            'status' => 1,
        ]);

        DB::table('users')->insert([
            'user_name' => 'xuanson',
            'usertype_id' => 4,
            'group_id' => mt_rand(1, 4),
            'user_email' => 'student3@gmail.com',
            'user_password' => Hash::make('123456'),
            'faculty_id' => mt_rand(1, 5),
            'status' => 1,
        ]);
    }
}
