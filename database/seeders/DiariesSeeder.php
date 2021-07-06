<?php

namespace Database\Seeders;

use Foostart\Category\Helpers\FoostartSeeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DiariesSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('diaries')->insert([
            'diary_name' => Str::random(10),
            'user_id' => 4,
            'status' => 1,
        ]);

        DB::table('diaries')->insert([
            'diary_name' => Str::random(10),
            'user_id' => 4,
            'status' => 1,
        ]);

        DB::table('diaries')->insert([
            'diary_name' => Str::random(10),
            'user_id' => 4,
            'status' => 0,
        ]);

        DB::table('diaries')->insert([
            'diary_name' => Str::random(10),
            'user_id' => 5,
            'status' => 1,
        ]);

        DB::table('diaries')->insert([
            'diary_name' => Str::random(10),
            'user_id' => 5,
            'status' => 1,
        ]);

        DB::table('diaries')->insert([
            'diary_name' => Str::random(10),
            'user_id' => 5,
            'status' => 0,
        ]);

        DB::table('diaries')->insert([
            'diary_name' => Str::random(10),
            'user_id' => 6,
            'status' => 1,
        ]);

        DB::table('diaries')->insert([
            'diary_name' => Str::random(10),
            'user_id' => 6,
            'status' => 1,
        ]);

        DB::table('diaries')->insert([
            'diary_name' => Str::random(10),
            'user_id' => 6,
            'status' => 0,
        ]);
       
        
    }
}
