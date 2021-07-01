<?php namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserTypesSeeder extends Seeder
{

    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->insert([
            'usertype_name' => 'Admin',
            'status' => 1,
        ]);
        DB::table('user_types')->insert([
            'usertype_name' => 'Trainer',
            'status' => 1,
        ]);
        DB::table('user_types')->insert([
            'usertype_name' => 'Teacher',
            'status' => 1,
        ]);
        DB::table('user_types')->insert([
            'usertype_name' => 'Student',
            'status' => 1,
        ]);
    }
}