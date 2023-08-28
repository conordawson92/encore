<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            [
                'id' => 1,
                'reviewer_id' => 1,
                'reviewed_id' => 2,
                'rating' => 5,
                'comment' => 'Great seller, fast shipping!',
                'dateReview' => '2023-08-22',
                'item_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
