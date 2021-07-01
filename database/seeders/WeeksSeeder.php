<?php namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class WeeksSeeder extends Seeder
{

    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20; $i++) { 
            DB::table('weeks')->insert([
                'week_weekdays' => Str::random(10),
                'status_check' => mt_rand(1, 2),
                'status' => 1,
                'diary_id' => mt_rand(1, 20),
                
            ]);
        }
    }
}