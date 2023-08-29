<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Item;

class CartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Assuming User and Item seeders have already been run and there are users and items in the database

        // Fetch some users and items
        $users = User::all();
        $items = Item::all();

        if (!$users->isEmpty() && !$items->isEmpty()) {
            // Let's add a couple of records in the carts table
            DB::table('carts')->insert([
                [
                    'user_id' => $users->first()->id,  // Using the first user
                    'item_id' => $items->first()->id,  // Using the first item
                    'quantity' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'user_id' => $users->last()->id,   // Using the last user
                    'item_id' => $items->last()->id,   // Using the last item
                    'quantity' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);
        }
    }
}   