<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(ManagerTableSeeder::class);
        $this->call(StoreTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(ProductClientTableSeeder::class);
        $this->call(DriversTableSeeder::class);
        $this->call(OsTableSeeder::class);
        $this->call(OrderTableSeeder::class);
    }
}
