<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(GoodsSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CharacteristicsSeeder::class);
        $this->call(SaleSeeder::class);
        $this->call(LaratrustSeeder::class);

    }
}
