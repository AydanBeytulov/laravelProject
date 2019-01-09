<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomOptions extends Model
{
    protected $table = "room_options";

    protected $attributes = [
        'value' => '0'
    ];
}
