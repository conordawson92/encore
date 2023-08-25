<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['id' => 1, 'category_name' => 'Accessories', 'parentCategory_id' => 1],
            ['id' => 2, 'category_name' => 'Bags', 'parentCategory_id' => 1],
            ['id' => 3, 'category_name' => 'Hoodie', 'parentCategory_id' => 1],
            ['id' => 4, 'category_name' => 'Jacket', 'parentCategory_id' => 1],
            ['id' => 5, 'category_name' => 'Jeans', 'parentCategory_id' => 1],
            ['id' => 6, 'category_name' => 'Jewelry', 'parentCategory_id' => 1],
            ['id' => 7, 'category_name' => 'Shirt', 'parentCategory_id' => 1],
            ['id' => 8, 'category_name' => 'Shoes', 'parentCategory_id' => 1],
            ['id' => 9, 'category_name' => 'Tshirts', 'parentCategory_id' => 1],
            ['id' => 10, 'category_name' => 'Accessories', 'parentCategory_id' => 2],
            ['id' => 11, 'category_name' => 'Bags', 'parentCategory_id' => 2],
            ['id' => 12, 'category_name' => 'Jacket', 'parentCategory_id' => 2],
            ['id' => 13, 'category_name' => 'Jeans', 'parentCategory_id' => 2],
            ['id' => 14, 'category_name' => 'Jewelry', 'parentCategory_id' => 2],
            ['id' => 15, 'category_name' => 'Shirt', 'parentCategory_id' => 2],
            ['id' => 16, 'category_name' => 'Shoes', 'parentCategory_id' => 2],
            ['id' => 17, 'category_name' => 'Tshirts', 'parentCategory_id' => 2],
            ['id' => 18, 'category_name' => 'Dress', 'parentCategory_id' => 2],
            ['id' => 19, 'category_name' => 'Skirt', 'parentCategory_id' => 2],
            ['id' => 20, 'category_name' => 'Accessories', 'parentCategory_id' => 3],
            ['id' => 21, 'category_name' => 'Shirt', 'parentCategory_id' => 3],
            ['id' => 22, 'category_name' => 'Shoes', 'parentCategory_id' => 3],
            ['id' => 23, 'category_name' => 'Tshirts', 'parentCategory_id' => 3],
            ['id' => 24, 'category_name' => 'Pants', 'parentCategory_id' => 3],
            ['id' => 25, 'category_name' => 'Accessories', 'parentCategory_id' => 4],
            ['id' => 26, 'category_name' => 'Shoes', 'parentCategory_id' => 4],
            ['id' => 27, 'category_name' => 'Tshirts', 'parentCategory_id' => 4],
            ['id' => 28, 'category_name' => 'Dress', 'parentCategory_id' => 4],
            ['id' => 29, 'category_name' => 'Pants', 'parentCategory_id' => 4]
        ]);
    }
}