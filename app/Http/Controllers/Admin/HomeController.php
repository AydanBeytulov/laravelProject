<?php

namespace App\Http\Controllers\Admin;

use App\Foods;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public static function showIndex()
    {
        return view('admin.home');
    }
}
