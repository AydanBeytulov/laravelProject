<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RoomOptions
 * @package App
 */
class RoomOptions extends Model
{
    /**
     * @var string
     */
    protected $table = "room_options";

    /**
     * @var array
     */
    protected $attributes = [
        'value' => '0'
    ];
}
