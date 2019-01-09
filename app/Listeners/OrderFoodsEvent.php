<?php

namespace App\Listeners;

use App\Events\OrderFoods;
use App\RoomsCartOrder;

class OrderFoodsEvent
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event and send email if order exist.
     *
     * @param  OrderFoods  $event
     * @return void
     */
    public function handle(OrderFoods $event)
    {

        if(RoomsCartOrder::where("id","=", $event->insertID )->count() > 0) {/*
            $data = [
                'no-reply' => 'test@nomail.com',
                'admin'    => 'test@nomail.com',
            ];

            Mail::send('emails.orderTemplate', ['data' => $data],
                function ($message) use ($data){
                    $message->from($data['no-reply'])
                        ->to($data['admin'])->subject('Body')
                        ->to($data['Email'])->subject('Your submitted information')
                        ->to('test@gmail.com', 'Test')->subject('Feedback');
                });
       */ };
    }
}
