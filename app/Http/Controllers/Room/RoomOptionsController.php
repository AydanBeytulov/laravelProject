<?php

namespace App\Http\Controllers\Room;

use App\RoomOptions;
use App\Http\Controllers\Controller;

/**
 * Class RoomOptionsController
 * @package App\Http\Controllers\Room
 */
class RoomOptionsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function index()
    {
        $dataForView = array();

        $dataForView['roomOptions'] = RoomOptions::all();

        return view("room.roomOptions",$dataForView);
    }

}


