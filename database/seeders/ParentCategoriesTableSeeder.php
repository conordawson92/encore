<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParentCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parent-categories')->insert([
            [
                'id' => 1,
                'parentcategoryName' => 'Men'
            ],
            [
                'id' => 2,
                'parentcategoryName' => 'Women'
            ],
            [
                'id' => 3,
                'parentcategoryName' => 'Boys'
            ],
            [
                'id' => 4,
                'parentcategoryName' => 'Girls'
            ]
        ]);
    }
}
