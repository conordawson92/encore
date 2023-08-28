<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([
            [
                'id' => 1,
                'buyerUser_id' => 2,
                'sellerUser_id' => 1,
                'item_id' => 3,
                'status' => 'rejected',
                'datePurchase' => '2023-08-23',
                'paymentDetails' => 'VISA xxxx-xxxx-xxxx-1234',
                'shippingDetails' => 'DHL Express',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now() 
            ]
        ]);
    }
}