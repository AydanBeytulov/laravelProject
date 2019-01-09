<?php

namespace App\Http\Controllers\Room;

use App\Events\OrderFoods;
use App\Foods;
use App\RoomsCart;
use App\RoomsCartOrder;
use App\RoomsInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;

/**
 * Class FoodsController
 * @package App\Http\Controllers\Room
 */
class FoodsController extends Controller
{

    //@TODO : There is some controller in this folder

    /**
     * Show foods index page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $dataForView = array();

        $dataForView['listFoods'] = Foods::all();

        return view("room.foods",$dataForView);
    }

    /**
     * Buy foods - save to DB and update user total amount
     *
     * @param $foodId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function buy($foodId)
    {
        if($foodId > 0){
            $food = Foods::where("id",$foodId)->first();

            if(isset($food->id)){
                DB::beginTransaction();
                try {
                    $roomCart = new RoomsCart();
                    $roomCart->userId = Auth::id();
                    $roomCart->name = $food->name;
                    $roomCart->qty = 1;
                    $roomCart->itemTable = "foods";
                    $roomCart->itemId = $food->id;
                    $roomCart->price = $food->price;
                    $roomCart->totalPrice = $roomCart->qty * $roomCart->price;
                    $roomCart->save();

                    $roomUpdate = RoomsInfo::where("userId",Auth::id())->first();
                    $roomUpdate->totalAmount  += $roomCart->totalPrice;
                    $roomUpdate->save();

                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollback();
                }

            }
        }

        return redirect(route("foods"));
    }

    /**
     * Save user foods order
     *
     * @param $products
     * @return bool
     */
    public static function buyProductsFromCart($products){
        //@TODO : Transaction

        //@TODO : GET USER ID

       DB::beginTransaction();
        try {
            $roomCartOrder = new RoomsCartOrder();
            $roomCartOrder->userId = 0;
            $roomCartOrder->itemTable = "foods";
            $roomCartOrder->totalPrice = 0;
            $roomCartOrder->save();

            $insertID = $roomCartOrder->id ;
            $totalPrice = 0;

            foreach($products as $product){
                $roomCart = new RoomsCart();
                $roomCart->userId =0;
                $roomCart->orderId = $insertID;
                $roomCart->name = $product['name'];
                $roomCart->qty = $product['qty'];
                $roomCart->itemTable = "foods";
                $roomCart->itemId = $product['id'];
                $roomCart->price = $product['price'];
                $roomCart->totalPrice = $product['qty'] * $product['price'];
                $roomCart->save();
                $totalPrice += $roomCart->totalPrice ;
            }

            $roomCartOrder->totalPrice = $totalPrice ;
            $roomCartOrder->save();

/*
            $roomUpdate = RoomsInfo::where("userId",Auth::id())->first();
            $roomUpdate->totalAmount  += $roomCart->totalPrice;
            $roomUpdate->save();
    */

          DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }

        Event::fire(new OrderFoods($insertID));

        return true;
    }
}