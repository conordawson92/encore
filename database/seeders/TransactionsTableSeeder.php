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
                'buyerUser_id' => 1,
                'sellerUser_id' => 5,
                'item_id' => 30,
                'status' => 'rejected',
                'datePurchase' => '2023-08-23',
                'paymentDetails' => 'VISA xxxx-xxxx-xxxx-1234',
                'shippingDetails' => 'DHL Express',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now() 
            ],
            [
                'id' => 2,
                'buyerUser_id' => 2,
                'sellerUser_id' => 4,
                'item_id' => 31,
                'status' => 'rejected',
                'datePurchase' => '2023-08-23',
                'paymentDetails' => 'VISA xxxx-xxxx-xxxx-1234',
                'shippingDetails' => 'DHL Express',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now() 
            ],
            [
                'id' => 3,
                'buyerUser_id' => 3,
                'sellerUser_id' => 3,
                'item_id' => 32,
                'status' => 'rejected',
                'datePurchase' => '2023-08-23',
                'paymentDetails' => 'VISA xxxx-xxxx-xxxx-1234',
                'shippingDetails' => 'DHL Express',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now() 
            ],
            [
                'id' => 4,
                'buyerUser_id' => 4,
                'sellerUser_id' => 2,
                'item_id' => 33,
                'status' => 'rejected',
                'datePurchase' => '2023-08-23',
                'paymentDetails' => 'VISA xxxx-xxxx-xxxx-1234',
                'shippingDetails' => 'DHL Express',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now() 
            ],
            [
                'id' => 5,
                'buyerUser_id' => 5,
                'sellerUser_id' => 1,
                'item_id' => 34,
                'status' => 'rejected',
                'datePurchase' => '2023-08-23',
                'paymentDetails' => 'VISA xxxx-xxxx-xxxx-1234',
                'shippingDetails' => 'DHL Express',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now() 
            ],
        ]);
    }
}