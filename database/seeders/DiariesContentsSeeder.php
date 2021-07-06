<?php namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DiariesContentsSeeder extends Seeder
{

    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 81; $i++) { 
            DB::table('diaries_contents')->insert([
                'diarycontent_weekday' => Str::random(10),
                'diarycontent_work' => Str::random(50),
                'diarycontent_content' => Str::random(50),
                'diarycontent_note' => Str::random(50),
                'weeks_id' => mt_rand(1, 27),
                'status' => mt_rand(0, 1)
            ]);
        }
    }
}
