<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {

    $json = File::get("products.json");
    $data = json_decode($json);
    foreach ($data as $obj) {
      App\Product::create(array(
        'name' => $obj->name,
        'photo' => 'https://coneplus.com.br/images/' . $obj->photo,
        'price' => $obj->price,
        'weight' => $obj->weight,
        'amount' => $obj->amount
      ));
    }
  }
}
