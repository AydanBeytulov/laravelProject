<?php

namespace App\Http\Controllers\Room;

use App\Events;
use App\Http\Controllers\Controller;
use App\RoomsCart;
use App\RoomsCartOrder;
use App\RoomsInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class EventsController
 * @package App\Http\Controllers\Room
 */
class EventsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function index()
    {
        $dataForView = array();

        $dataForView['events'] = $this->listEvents();

        return view('room/events', $dataForView);
    }

    /**
     * @return Events[]|\Illuminate\Database\Eloquent\Collection
     */
    private function listEvents(){
        $events = $this->getNextEvents(5);

        foreach ($events as $key=>$event){
            $events[$key]->duration = $this->calculateEventsDuration($event->start,$event->end);

            if($event->price == 0){
                $events[$key]->price = "free";
            }
        }

        return $events;
    }

    /**
     * @param $qty
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection
     */
    private function getNextEvents($qty){
        return Events::query()
            ->orderBy("start","DESC")
            ->take($qty)
            ->get();
    }

    /**
     * @param $start
     * @param $end
     * @return false|int
     */
    private function calculateEventsDuration($start, $end){
        return strtotime($end) - strtotime($start);
    }

    /**
     * @param Request $request
     * @return bool|\Illuminate\Http\RedirectResponse
     */
    public function registerForEvents(Request $request){

       $eventID = $request->input("eventId");

       $event = Events::find($eventID)->first();

       if($event->id === null){
           return false;
       }

        if(Auth::id()){
            DB::beginTransaction();
            try {
                $roomCartOrder = new RoomsCartOrder();
                $roomCartOrder->userId = Auth::id();
                $roomCartOrder->itemTable = "events";
                $roomCartOrder->totalPrice = 0;
                $roomCartOrder->save();

                $insertID = $roomCartOrder->id ;
                $totalPrice = 0;


                $roomCart = new RoomsCart();
                $roomCart->userId = Auth::id();
                $roomCart->orderId = $insertID;
                $roomCart->name = $event->name;
                $roomCart->qty = 1;
                $roomCart->itemTable = "events";
                $roomCart->itemId = $event->id;
                $roomCart->price = $event->price;
                $roomCart->totalPrice = $event->price;
                $roomCart->save();
                $totalPrice += $roomCart->totalPrice ;


                $roomCartOrder->totalPrice = $totalPrice ;
                $roomCartOrder->save();


                $roomUpdate = RoomsInfo::where("userId",Auth::id())->first();
                $roomUpdate->totalAmount  = $totalPrice;
                $roomUpdate->save();


                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                return false;
            }

            return redirect()->route("events");
        }else{
            return false;
        }


    }
}
