<?php namespace Database\Seeders;

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
        for ($i=0; $i < 20; $i++) { 
            DB::table('users')->insert([
                'user_name' => Str::random(10),
                'usertype_id' => mt_rand(1, 5),
                'group_id' => mt_rand(1, 5),
                'user_email' => 'cansa'.$i.'@gmail.com',
                'user_password' => Hash::make('123456'),
                'faculty_id' => mt_rand(1, 5),
                'status' => 1,
            ]);
        }
    }
}