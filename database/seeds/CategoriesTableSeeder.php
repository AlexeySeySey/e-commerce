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
                'image' => 'public/images/upload_cat/21.jpeg',
                'ENname' => 'Household',
                'RUname'=>'Домохозяйство',
                'UKname'=>'Господарство'
            ],
            [
                'image' => 'public/images/upload_cat/21.jpeg',
                'ENname' => 'Vegetables',
                'RUname'=>'Овощи',
                'UKname'=>'Овочі'
            ],
            [
                'image' => 'public/images/upload_cat/21.jpeg',
                'ENname' => 'Fruit',
                'RUname'=>'Фрукти',
                'UKname'=>'Фрукти'
            ],
            [
                'image' => 'public/images/upload_cat/21.jpeg',
                'ENname' => 'Soft_drinks',
                'RUname'=>'Безалкогольные напитки',
                'UKname'=>'Безалкогольні напої'
            ],
            [
                'image' => 'public/images/upload_cat/21.jpeg',
                'ENname' => 'Juices',
                'RUname'=>'Соки',
                'UKname'=>'Соки'
            ],
            [
                'image' => 'public/images/upload_cat/21.jpeg',
                'ENname' => 'Energy_Drinks',
                'RUname'=>'Энергетики',
                'UKname'=>'Енергетики'
            ],
            [
                'image' => 'public/images/upload_cat/21.jpeg',
                'ENname' => 'Frozen_Snacks',
                'RUname'=>'Замороженные закуски',
                'UKname'=>'Заморожені закуски'
            ],
            [
                'image' => 'public/images/upload_cat/21.jpeg',
                'ENname' => 'Frozen_Vegetables',
                'RUname'=>'Замороженные овощи',
                'UKname'=>'Заморожені овочі'
            ],
            [
                'image' => 'public/images/upload_cat/21.jpeg',
                'ENname' => 'Bakery',
                'RUname'=>'Хлебобулочные изделия',
                'UKname'=>'Хлібобулочні вироби'
            ],
            [
                'image' => 'public/images/upload_cat/21.jpeg',
                'ENname' => 'Pet_food',
                'RUname'=>'Корм для животных',
                'UKname'=>'Корм для тварин'
            ],
            [
                'image' => 'public/images/upload_cat/21.jpeg',
                'ENname' => 'Household_Cleaning',
                'RUname'=>'Чистящие средства',
                'UKname'=>'Чистячі засоби'
            ],
            [
                'image' => 'public/images/upload_cat/21.jpeg',
                'ENname' => 'Household_Utensils',
                'RUname'=>'Посуда',
                'UKname'=>'Посуд'
            ],

        ]);
    }
}
