<?php

namespace App\Http\Controllers\Admin;

use App\Foods;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class HomeController
 * @package App\Http\Controllers\Admin
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showIndex()
    {
        return view('admin.home');
    }
}
