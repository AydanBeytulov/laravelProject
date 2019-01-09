<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "room1",
            'password' => "$2y$10$1om93/t/wPqlXjapVT.NcuZl/AqkeKfh6l8x70VF1zcIKdk57XQoW",
            'type' => "2",
            'remember_token' => "VtgJP1G1prAiWpodwxASAoKG3lvv9w6BuQD44vhHfx0MlDhS8IXuJeDMELuy",
        ]);
    }
}
