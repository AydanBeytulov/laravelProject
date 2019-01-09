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
         //@TODO: Seeds

         $this->call(UsersTableSeeder::class);
         $this->call(FoodsTableSeeder::class);
         $this->call(RoomOptionsTableSeeder::class);
         $this->call(RoomInfoTableSeeder::class);
    }
}
