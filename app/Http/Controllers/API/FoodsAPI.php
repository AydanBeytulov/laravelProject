<?php

namespace App\Http\Controllers\API;

use App\Foods;
use App\Http\Resources\FoodsResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class FoodsAPI
 * @package App\Http\Controllers\API\Resources
 */
class FoodsAPI extends Controller
{

    /**
     * FoodsAPI constructor.
     */
    public function __construct()
    {
     //  $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Foods::paginate(10);
    }

    /**
     * @param Request $request
     * @return FoodsResource
     */
    public function store(Request $request)
    {
        $food = Foods::create([
            'name' => $request->name,
            'image' => $request->image,
            'price' => $request->price,
        ]);

        $response = new FoodsResource($food) ;
        return response()->json(["response" => $response ],201);
    }


    /**
     * @param $id
     * @return FoodsResource
     */
    public function show($id)
    {
        return new FoodsResource(Foods::find($id));
    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        Foods::find($id)->update($request->only(['name', 'image','price']));
        return response()->json(["response" => "Success" ],200);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        Foods::find($id)->delete();
        return response()->json(null, 204);
    }
}
