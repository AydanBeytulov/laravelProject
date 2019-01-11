<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RoomsCartOrder
 * @package App
 */
class RoomsCartOrder extends Model
{
    /**
     * @var string
     */
    protected $table = "rooms_cart_orders";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getItems (){
        return $this->hasMany("App\RoomsCart","orderId","id");
    }
}
