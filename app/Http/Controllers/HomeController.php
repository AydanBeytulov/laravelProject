<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use \App\Http\Controllers\Room\HomeController as RoomHome;
use \App\Http\Controllers\Admin\HomeController as AdminHome;
use \App\Http\Controllers\User\HomeController as UserHome;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{

    /**
     * HomeController constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application homes for different user roles.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function index()
    {

        $userData = $this->getCurrentUserData();

        switch ($userData->type){
            case "room":
                return RoomHome::showIndex();
            break;

            case "admin":
                return AdminHome::showIndex();
            break;

            case "user":
                return UserHome::showIndex();
            break;
            default:
                Auth::logout();
                return redirect("/");
            break;
        }
    }
}
