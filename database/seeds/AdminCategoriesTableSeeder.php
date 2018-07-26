<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_categories')->insert([

            [
                'name' => "Categories",
                'icon' => "<i class='fa fa-pie-chart'></i>",
            ],
            [
                'name' => "Users",
                'icon' => "<i class='fa fa-users'></i>",
            ],
            [
                'name' => "Goods",
                'icon' => "<i class='fa fa-tags'></i>",
            ],
            [
                'name' => "News",
                'icon' => "<i class='fa fa-bell-o'></i>",
            ],
            [
                'name' => "Sales",
                'icon' => "<i class='fa fa-cart-arrow-down'></i>",
            ],
            [
                'name' => "Configurations",
                'icon' => "<i class='fa fa-cogs'></i>",
            ],
            [
                'name' => "Statistics",
                'icon' => "<i class='fa fa-bar-chart'></i>",
            ]

        ]);
    }
}
