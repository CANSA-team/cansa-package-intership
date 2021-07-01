<?php namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{

    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) { 
            DB::table('users')->insert([
                'user_name' =>'Can sa',
                'usertype_id' => '1',
                'group_id' => '1',
                'user_email' => 'cansa@gmail.com',
                'user_password' => Hash::make('123456'),
                'faculty_id' => '1',
                'status' => 1,
            ]);
        }
    }
}