<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Foods
 * @package App
 */
class Foods extends Model
{
    /**
     * @var string
     */
    protected $table = "foods";

    /**
     * @var array
     */
    protected $fillable = ['name','image','price'];
}

