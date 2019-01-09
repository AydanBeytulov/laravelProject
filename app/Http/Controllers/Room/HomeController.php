<?php

namespace App\Http\Controllers\Room;

use App\RoomsCartOrder;
use App\RoomsInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

/**
 * Class HomeController
 * @package App\Http\Controllers\Room
 */
class HomeController extends Controller
{
    /**
     * Show room index page, statistics and totals
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function showIndex()
    {
        $dataForView = array();

        $dataForView["userInfo"] = RoomsInfo::where("userId",Auth::id())->first();
        $dataForView['userCart'] = RoomsCartOrder::where("userId",Auth::id())->get();

        $totals = array();
        $totals['totalPrice'] = 0;
        foreach($dataForView['userCart'] as $cartItem){
            $totals['totalPrice'] += $cartItem->totalPrice;
        }

        $dataForView['totals'] = $totals;

        return view('room.home',$dataForView);
    }
}
