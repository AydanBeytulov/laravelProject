<?php

use Illuminate\Database\Seeder;

class RoomOptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('room_options')->insert([
            'name' => "test",
            'value' => "0",
            'userId' => "1",
        ]);

        DB::table('room_options')->insert([
            'name' => "door",
            'value' => "0",
            'userId' => "1",
        ]);

        DB::table('room_options')->insert([
            'name' => "lamp",
            'value' => "0",
            'userId' => "1",
        ]);
    }
}
