<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeNotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type-notifications')->insert([
            [
                'id' => 1,
                'typeNotificationName' => 'Message'
            ],
            [
                'id' => 2,
                'typeNotificationName' => 'Transaction'
            ],
            [
                'id' => 3,
                'typeNotificationName' => 'Review'
            ]
        ]);
    }
}
