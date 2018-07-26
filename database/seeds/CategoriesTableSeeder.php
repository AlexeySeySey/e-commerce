<?php

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

            [
                'image' => '21.jpeg',
                'name' => 'Household',
            ],
            [
                'image' => '21.jpeg',
                'name' => 'Vegetables',
            ],
            [
                'image' => '21.jpeg',
                'name' => 'Fruit',
            ],
            [
                'image' => '21.jpeg',
                'name' => 'Soft_drinks',
            ],
            [
                'image' => '21.jpeg',
                'name' => 'Juices',
            ],
            [
                'image' => '21.jpeg',
                'name' => 'Energy_Drinks',
            ],
            [
                'image' => '21.jpeg',
                'name' => 'Frozen_Snacks',
            ],
            [
                'image' => '21.jpeg',
                'name' => 'Frozen_Vegetables',
            ],
            [
                'image' => '21.jpeg',
                'name' => 'Bakery',
            ],
            [
                'image' => '21.jpeg',
                'name' => 'Pet_food',
            ],
            [
                'image' => '21.jpeg',
                'name' => 'Household_Cleaning',
            ],
            [
                'image' => '21.jpeg',
                'name' => 'Household_Utensils',
            ],

        ]);
    }
}
