<?php

use Illuminate\Database\Seeder;

class ProductOrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\ProductOrder', 1)->create();
    }
}
