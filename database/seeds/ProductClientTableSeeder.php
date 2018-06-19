<?php

use Illuminate\Database\Seeder;

class ProductClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\ProductClient',1)->create();
    }
}
