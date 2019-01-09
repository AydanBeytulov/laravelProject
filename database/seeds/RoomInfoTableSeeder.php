<?php

use Illuminate\Database\Seeder;

class RoomInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('room_info')->insert([
            'userId' => "1",
            'names' => "Aydin Beytulov",
            'totalAmount' => 0,
            'reservationType' => 0
        ]);
    }
}
