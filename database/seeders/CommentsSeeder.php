<?php namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CommentsSeeder extends Seeder
{

    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 243; $i++) { 
            DB::table('comments')->insert([
                'user_id' => mt_rand(1, 3),
                'comment_content' => Str::random(10),
                'comment_rating' => mt_rand(1, 5),
                'comment_type' => mt_rand(1, 81),
                'status' => mt_rand(0, 1),
            ]);
        }
    }
}