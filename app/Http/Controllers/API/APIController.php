<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Room\FoodsController;
use Illuminate\Http\Request;
use App\RoomOptions;
use App\Http\Controllers\Controller;

/**
 * Class APIController
 * @package App\Http\Controllers\API
 */
class APIController extends Controller
{


    //@TODO : API functions

    //@TODO -> да се видят евентите
    //@TODO -> Да видя да защитя API-то с токън

    /**
     * APIController constructor.
     */
    public function __construct()
    {
      //  $this->middleware('auth:api');
    }

    /**
     * Update room options
     *
     * @param $roomOption
     * @param $value
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateOption($roomOption, $value)
    {
        if( $value === "true" || $value === "false"){
            $roomOption = RoomOptions::where("id", $roomOption)->first();
            if(is_null($roomOption)){
                return response()->json(["response" => "Wrong data" ],400);
            }else{
                if($value === "true"){ $value = 1; }
                if($value === "false"){ $value = 0; }
                $roomOption->value = $value;
                if($roomOption->save() === true){
                    return response()->json(["response" => "Success" ],200);
                }else{
                    return response()->json(["response" => "Error with saving" ],500);
                }
            }
        }else{
            return response()->json(["response" => "Wrong data" ],400);
        }
    }

    /**
     * Change current language
     *
     * @param $value
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeCurrentLanguage($value){
        if($this->setCurrentLanguage($value)){
            return response()->json(["response" => "Success" ],200);
        }else{
            return response()->json(["response" => "Wrong data" ],400);
        }
    }

    public function makeFoodsOrder(Request $request){
        if(isset($request['products']) && is_array($request['products'])){
            if(FoodsController::buyProductsFromCart($request['products'])){
                 return response()->json(["response" => "Success" ],200);
             }else{
                return response()->json(["response" => "Error with saving" ],500);
             }
        }else{
            return response()->json(["response" => "Wrong data" ],400);
        }

    }

}
