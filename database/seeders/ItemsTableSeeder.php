<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log; // Import the Log facade

class ItemsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Log::info('Starting ItemsTableSeeder');

        DB::table('items')->insert(
            [
                'id' => 1,
                'ItemName' => 'Boys Accessories',
                'itemImage' => '/storage/images/Boys/Accessories/Boys_Accessories_1.jpg',
                'description' => 'Boys accessory description',
                'price' => 10,
                'size' => 'One Size',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'accessory,boys',
                'status' => 'available',
                'category_id' => 20,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 2,
                'ItemName' => 'Boys Shirt',
                'itemImage' => '/storage/images/Boys/Shirt/Boys_Shirt_1.jpg',
                'description' => 'Boys shirt description',
                'price' => 20,
                'size' => 'M',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'shirt,boys',
                'status' => 'available',
                'category_id' => 21,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 3,
                'ItemName' => 'Boys Shoes',
                'itemImage' => '/storage/images/Boys/Shoes/Boys_Shoes_1.jpg',
                'description' => 'Boys shoes description',
                'price' => 30,
                'size' => '6',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'shoes,boys',
                'status' => 'available',
                'category_id' => 22,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 4,
                'ItemName' => 'Boys T-shirt',
                'itemImage' => '/storage/images/Boys/Tshirts/Boys_Tshirt_1.jpg',
                'description' => 'Boys T-shirt description',
                'price' => 15,
                'size' => 'M',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'tshirt,boys',
                'status' => 'available',
                'category_id' => 23,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 5,
                'ItemName' => 'Boys Pants',
                'itemImage' => '/storage/images/Boys/Pants/Boys_Pants_1.jpg',
                'description' => 'Boys pants description',
                'price' => 25,
                'size' => 'M',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'pants,boys',
                'status' => 'available',
                'category_id' => 24,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 6,
                'ItemName' => 'Girls Accessories',
                'itemImage' => '/storage/images/Girls/Accessories/Girls_Accessories_1.jpg',
                'description' => 'Girls accessory description',
                'price' => 10,
                'size' => 'One Size',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'accessory,girls',
                'status' => 'available',
                'category_id' => 25,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 7,
                'ItemName' => 'Girls Shoes',
                'itemImage' => '/storage/images/Girls/Shoes/Girls_Shoes_1.jpg',
                'description' => 'Girls shoes description',
                'price' => 30,
                'size' => '5',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'shoes,girls',
                'status' => 'available',
                'category_id' => 26,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 8,
                'ItemName' => 'Girls T-shirt',
                'itemImage' => '/storage/images/Girls/Tshirts/Girls_Tshirt_1.jpg',
                'description' => 'Girls T-shirt description',
                'price' => 15,
                'size' => 'S',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'tshirt,girls',
                'status' => 'available',
                'category_id' => 27,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 9,
                'ItemName' => 'Girls Dress',
                'itemImage' => '/storage/images/Girls/Dress/Girls_Dress_1.jpg',
                'description' => 'Girls dress description',
                'price' => 25,
                'size' => 'S',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'dress,girls',
                'status' => 'available',
                'category_id' => 28,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 10,
                'ItemName' => 'Girls Pants',
                'itemImage' => '/storage/images/Girls/Pants/Girls_Pants_1.jpg',
                'description' => 'Girls pants description',
                'price' => 20,
                'size' => 'S',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'pants,girls',
                'status' => 'available',
                'category_id' => 29,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 11,
                'ItemName' => 'Women Accessory',
                'itemImage' => '/storage/images/Women/Accessories/Womens_Accessories_1.jpg',
                'description' => 'Women accessory description',
                'price' => 12,
                'size' => 'One Size',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'accessory,women',
                'status' => 'available',
                'category_id' => 10,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 12,
                'ItemName' => 'Women Bag',
                'itemImage' => '/storage/images/Women/Bags/Womens_Bag_1.jpg',
                'description' => 'Women bag description',
                'price' => 35,
                'size' => 'M',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'bag,women',
                'status' => 'available',
                'category_id' => 11,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 13,
                'ItemName' => 'Women Jacket',
                'itemImage' => '/storage/images/Women/Jacket/Womens_Jacket_1.jpg',
                'description' => 'Women jacket description',
                'price' => 50,
                'size' => 'M',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'jacket,women',
                'status' => 'available',
                'category_id' => 12,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 14,
                'ItemName' => 'Women Jeans',
                'itemImage' => '/storage/images/Women/Jeans/Womens_Jeans_1.jpg',
                'description' => 'Women jeans description',
                'price' => 40,
                'size' => '28',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'jeans,women',
                'status' => 'available',
                'category_id' => 13,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 15,
                'ItemName' => 'Women Jewelry',
                'itemImage' => '/storage/images/Women/Jewelry/Womens_Jewelry_1.jpg',
                'description' => 'Women jewelry description',
                'price' => 45,
                'size' => 'One Size',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'jewelry,women',
                'status' => 'available',
                'category_id' => 14,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 16,
                'ItemName' => 'Women Shirt',
                'itemImage' => '/storage/images/Women/Shirt/Womens_Shirt_1.jpg',
                'description' => 'Women shirt description',
                'price' => 20,
                'size' => 'M',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'shirt,women',
                'status' => 'available',
                'category_id' => 15,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 17,
                'ItemName' => 'Women Shoes',
                'itemImage' => '/storage/images/Women/Shoes/Womens_Shoes_1.jpg',
                'description' => 'Women shoes description',
                'price' => 55,
                'size' => '7',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'shoes,women',
                'status' => 'available',
                'category_id' => 16,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 18,
                'ItemName' => 'Women T-shirt',
                'itemImage' => '/storage/images/Women/Tshirts/Womens_Tshirt_1.jpg',
                'description' => 'Women T-shirt description',
                'price' => 18,
                'size' => 'M',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'tshirt,women',
                'status' => 'available',
                'category_id' => 17,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 19,
                'ItemName' => 'Women Dress',
                'itemImage' => '/storage/images/Women/Dress/Womens_Dress_1.jpg',
                'description' => 'Women dress description',
                'price' => 60,
                'size' => 'M',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'dress,women',
                'status' => 'available',
                'category_id' => 18,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 20,
                'ItemName' => 'Women Skirt',
                'itemImage' => '/storage/images/Women/Skirt/Womens_Skirt_1.jpg',
                'description' => 'Women skirt description',
                'price' => 25,
                'size' => 'M',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'skirt,women',
                'status' => 'available',
                'category_id' => 19,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 21,
                'ItemName' => 'Men Accessories',
                'itemImage' => '/storage/images/Men/Accessories/Mens_Accessories_1.jpg',
                'description' => 'Men accessory description',
                'price' => 15,
                'size' => 'One Size',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'accessory,men',
                'status' => 'available',
                'category_id' => 1,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 22,
                'ItemName' => 'Men Bag',
                'itemImage' => '/storage/images/Men/Bags/Mens_Bag_1.jpg',
                'description' => 'Men bag description',
                'price' => 40,
                'size' => 'L',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'bag,men',
                'status' => 'available',
                'category_id' => 2,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 23,
                'ItemName' => 'Men Hoodie',
                'itemImage' => '/storage/images/Men/Hoodie/Mens_Hoodie_1.jpg',
                'description' => 'Men hoodie description',
                'price' => 35,
                'size' => 'L',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'hoodie,men',
                'status' => 'available',
                'category_id' => 3,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 24,
                'ItemName' => 'Men Jacket',
                'itemImage' => '/storage/images/Men/Jacket/Mens_Jacket_1.jpg',
                'description' => 'Men jacket description',
                'price' => 55,
                'size' => 'L',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'jacket,men',
                'status' => 'available',
                'category_id' => 4,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 25,
                'ItemName' => 'Men Jeans',
                'itemImage' => '/storage/images/Men/Jeans/Mens_Jeans_1.jpg',
                'description' => 'Men jeans description',
                'price' => 45,
                'size' => '32',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'jeans,men',
                'status' => 'available',
                'category_id' => 5,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 26,
                'ItemName' => 'Men Jewelry',
                'itemImage' => '/storage/images/Men/Jewelry/Mens_Jewelry_1.jpg',
                'description' => 'Men jewelry description',
                'price' => 50,
                'size' => 'One Size',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'jewelry,men',
                'status' => 'available',
                'category_id' => 6,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 27,
                'ItemName' => 'Men Shirt',
                'itemImage' => '/storage/images/Men/Shirt/Mens_Shirt_1.jpg',
                'description' => 'Men shirt description',
                'price' => 25,
                'size' => 'L',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'shirt,men',
                'status' => 'available',
                'category_id' => 7,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 28,
                'ItemName' => 'Men Shoes',
                'itemImage' => '/storage/images/Men/Shoes/Mens_Shoes_1.jpg',
                'description' => 'Men shoes description',
                'price' => 60,
                'size' => '9',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'shoes,men',
                'status' => 'available',
                'category_id' => 8,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 29,
                'ItemName' => 'Men T-shirt',
                'itemImage' => '/storage/images/Men/Tshirts/Mens_Tshirt_1.jpg',
                'description' => 'Men T-shirt description',
                'price' => 20,
                'size' => 'L',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'tshirt,men',
                'status' => 'available',
                'category_id' => 9,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 30,
                'ItemName' => 'Men Bag',
                'itemImage' => '/storage/images/Men/Bags/Mens_Bag_2.jpg',
                'description' => 'Men bag description',
                'price' => 40,
                'size' => 'L',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'bag,men',
                'status' => 'available',
                'category_id' => 2,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 31,
                'ItemName' => 'Men Jacket',
                'itemImage' => '/storage/images/Men/Jacket/Mens_Jacket_2.jpg',
                'description' => 'Men jacket description',
                'price' => 55,
                'size' => 'L',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'jacket,men',
                'status' => 'available',
                'category_id' => 4,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 32,
                'ItemName' => 'Men Jeans',
                'itemImage' => '/storage/images/Men/Jeans/Mens_Jeans_2.jpg',
                'description' => 'Men jeans description',
                'price' => 45,
                'size' => '32',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'jeans,men',
                'status' => 'available',
                'category_id' => 5,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 33,
                'ItemName' => 'Men Shoes',
                'itemImage' => '/storage/images/Men/Shoes/Mens_Shoes_2.jpg',
                'description' => 'Men shoes description',
                'price' => 60,
                'size' => '9',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'shoes,men',
                'status' => 'available',
                'category_id' => 8,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 34,
                'ItemName' => 'Men T-shirt',
                'itemImage' => '/storage/images/Men/Tshirts/Mens_Tshirt_2.jpg',
                'description' => 'Men T-shirt description',
                'price' => 20,
                'size' => 'L',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'tshirt,men',
                'status' => 'available',
                'category_id' => 9,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 35,
                'ItemName' => 'Women Accessory',
                'itemImage' => '/storage/images/Women/Accessories/Womens_Accessories_2.jpg',
                'description' => 'Women accessory description',
                'price' => 12,
                'size' => 'One Size',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'accessory,women',
                'status' => 'available',
                'category_id' => 10,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 36,
                'ItemName' => 'Women Bag',
                'itemImage' => '/storage/images/Women/Bags/Womens_Bag_2.jpg',
                'description' => 'Women bag description',
                'price' => 35,
                'size' => 'M',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'bag,women',
                'status' => 'available',
                'category_id' => 11,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 37,
                'ItemName' => 'Women Dress',
                'itemImage' => '/storage/images/Women/Dress/Womens_Dress_2.jpg',
                'description' => 'Women dress description',
                'price' => 60,
                'size' => 'M',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'dress,women',
                'status' => 'available',
                'category_id' => 18,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 38,
                'ItemName' => 'Women Jeans',
                'itemImage' => '/storage/images/Women/Jeans/Womens_Jeans_2.jpg',
                'description' => 'Women jeans description',
                'price' => 40,
                'size' => '28',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'jeans,women',
                'status' => 'available',
                'category_id' => 13,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 39,
                'ItemName' => 'Women Jewelry',
                'itemImage' => '/storage/images/Women/Jewelry/Womens_Jewelry_2.jpg',
                'description' => 'Women jewelry description',
                'price' => 45,
                'size' => 'One Size',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'jewelry,women',
                'status' => 'available',
                'category_id' => 14,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 40,
                'ItemName' => 'Women Jewelry',
                'itemImage' => '/storage/images/Women/Jewelry/Womens_Jewelry_3.jpg',
                'description' => 'Women jewelry description',
                'price' => 45,
                'size' => 'One Size',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'jewelry,women',
                'status' => 'available',
                'category_id' => 14,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 41,
                'ItemName' => 'Women T-shirt',
                'itemImage' => '/storage/images/Women/Tshirts/Womens_Tshirt_2.jpg',
                'description' => 'Women T-shirt description',
                'price' => 18,
                'size' => 'M',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'tshirt,women',
                'status' => 'available',
                'category_id' => 17,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 42,
                'ItemName' => 'Boys Shirt',
                'itemImage' => '/storage/images/Boys/Shirt/Boys_Shirt_2.jpg',
                'description' => 'Boys shirt description',
                'price' => 20,
                'size' => 'M',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'shirt,boys',
                'status' => 'available',
                'category_id' => 21,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        );
        DB::table('items')->insert(
            [
                'id' => 43,
                'ItemName' => 'Girls Pants',
                'itemImage' => '/storage/images/Girls/Pants/Girls_Pants_2.jpg',
                'description' => 'Girls pants description',
                'price' => 20,
                'size' => 'S',
                'brand' => 'BrandName',
                'condition' => 'New',
                'dateListed' => '2023-08-24',
                'quantity' => 10,
                'tags' => 'pants,girls',
                'status' => 'available',
                'category_id' => 29,
                'sellerUser_id' => 1,
                'buyerUser_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );
        Log::info('ItemsTableSeeder completed');
    }
}
