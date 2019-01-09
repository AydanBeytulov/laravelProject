<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomsCartOrder extends Model
{
    protected $table = "rooms_cart_orders";

    public function getItems (){
        return $this->hasMany("App\RoomsCart","orderId","id");
    }
}
