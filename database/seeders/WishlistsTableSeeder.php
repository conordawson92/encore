<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WishlistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wishlists')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'item_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'id' => 2,
                'user_id' => 2,
                'item_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'user_id' => 3,
                'item_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'id' => 4,
                'user_id' => 4,
                'item_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'user_id' => 5,
                'item_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'id' => 6,
                'user_id' => 1,
                'item_id' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 7,
                'user_id' => 2,
                'item_id' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'id' => 8,
                'user_id' => 3,
                'item_id' => 8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}