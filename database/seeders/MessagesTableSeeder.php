<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            [
                'id' => 3,
                'senderUser_id' => 1,
                'receiverUser_id' => 2,
                'item_id' => 5,
                'dateSent' => '2023-08-21',
                'content' => 'Hi! Is the iPhone still available?',
                'status' => 'unread',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}