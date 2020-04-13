<?php

namespace App\Http\Controllers;

use App\Model\Stock;
use Illuminate\Http\Request;
use App\Http\Resources\Stock\StockResource;
use App\Http\Requests\StockRequest;
use Symfony\Component\HttpFoundation\Response;

class StockController extends Controller
{

    /**
     * @OA\GET(
     *     path="/api/stocks",
     *      operationId="getStockList",
     *     tags={"Stock"},
     *     summary="Returns API response of all Stock",
     *     description="A sample test of the API",
     *     @OA\Response(
     *         response=200,
     *         description="successful operation"
     *     ),
     *     
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Stock::all();

    }

    /**
     * @OA\Post(
     *      path="/api/stocks",
     *      operationId="storeStock",
     *      tags={"Stock"},
     *      summary="Store new Stock",
     *      description="Returns Stock data",
     *     
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StockRequest $request)
    {
        //
        $stock = new Stock;
        $stock->name = $request->name;
        $stock->address = $request->address;
        $stock->description = $request->description;
        $stock->save();
        return response([ 'data'=> new StockResource($stock)],Response::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     *      path="/api/stocks/{id}",
     *      operationId="getStockById",
     *      tags={"Stock"},
     *      summary="Get Stock information",
     *      description="Returns Stock data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Stock id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response( 
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
         // return $stock;
         return new StockResource($stock);
    }

     /**
     * @OA\Put(
     *      path="/api/stocks/{id}",
     *      operationId="updateStock",
     *      tags={"Stock"},
     *      summary="Update existing Stock",
     *      description="Returns updated Stock data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Stock id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        //
        $stock->update($request->all());
        return response([
            'data' => new StockResource($stock)
    ],Response::HTTP_CREATED);
    }


     /**
     * @OA\Delete(
     *      path="/api/stocks/{id}",
     *      operationId="deleteStock",
     *      tags={"Stock"},
     *      summary="Delete existing Stock",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Stock id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        //
        $stock->delete();
        return ('item is deleted');
    }
}
