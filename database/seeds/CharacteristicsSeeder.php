<?php

use Illuminate\Database\Seeder;

class CharacteristicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Characteristic',60)->create();
    }
}
