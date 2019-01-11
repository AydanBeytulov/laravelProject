<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RoomsCart
 * @package App
 */
class RoomsCart extends Model
{
    /**
     * @var string
     */
    protected $table = "rooms_cart";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function image()
    {
        $relation = "";
        $column = "";
        if($this->attributes['itemTable'] == "foods"){
            $relation = "App\Foods";
            $column = "image";
        } elseif($this->attributes['itemTable'] == "events"){
            $relation = "App\Events";
            $column = "image";
        }

        if($relation != ""){
            return $this->hasOne($relation,"id","itemId")->select($column);
        }else{
            abort(500, "There is error # m00001 , itemTable:".$this->attributes['itemTable']);
        }
    }
}