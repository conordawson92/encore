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
                'reviewed_id' => 5,
                'rating' => 5,
                'comment' => 'Great seller, fast shipping!',
                'dateReview' => '2023-08-22',
                'item_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'reviewer_id' => 2,
                'reviewed_id' => 5,
                'rating' => 5,
                'comment' => 'Great seller, fast shipping!',
                'dateReview' => '2023-08-22',
                'item_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'reviewer_id' => 3,
                'reviewed_id' => 4,
                'rating' => 5,
                'comment' => 'Great seller, fast shipping!',
                'dateReview' => '2023-08-22',
                'item_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 4,
                'reviewer_id' => 4,
                'reviewed_id' => 3,
                'rating' => 5,
                'comment' => 'Great seller, fast shipping!',
                'dateReview' => '2023-08-22',
                'item_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 5,
                'reviewer_id' => 5,
                'reviewed_id' => 5,
                'rating' => 5,
                'comment' => 'Great seller, fast shipping!',
                'dateReview' => '2023-08-22',
                'item_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 6,
                'reviewer_id' => 5,
                'reviewed_id' => 4,
                'rating' => 5,
                'comment' => 'Great seller, fast shipping!',
                'dateReview' => '2023-08-22',
                'item_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 7,
                'reviewer_id' => 5,
                'reviewed_id' => 3,
                'rating' => 5,
                'comment' => 'Great seller, fast shipping!',
                'dateReview' => '2023-08-22',
                'item_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 8,
                'reviewer_id' => 5,
                'reviewed_id' => 2,
                'rating' => 5,
                'comment' => 'Great seller, fast shipping!',
                'dateReview' => '2023-08-22',
                'item_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 9,
                'reviewer_id' => 5,
                'reviewed_id' => 1,
                'rating' => 5,
                'comment' => 'Great seller, fast shipping!',
                'dateReview' => '2023-08-22',
                'item_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

        ]);
    }
}
