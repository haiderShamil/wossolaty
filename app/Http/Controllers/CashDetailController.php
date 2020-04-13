<?php

namespace App\Http\Controllers;

use App\Model\Cash_Detail;
use Illuminate\Http\Request;
use App\Http\Resources\Cash_Detail\Cash_DetailResource;
use App\Http\Requests\Cash_DetailRequest;
use Symfony\Component\HttpFoundation\Response;

class CashDetailController extends Controller
{
    /**
     * @OA\GET(
     *     path="/api/cash_details",
     *      operationId="getCash_DetailList",
     *     tags={"Cash_Detail"},
     *     summary="Returns API response of all Cash_Detail",
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
        return Cash_Detail::all();

    }

    /**
     * @OA\Post(
     *      path="/api/cash_details",
     *      operationId="storeCash_Detail",
     *      tags={"Cash_Detail"},
     *      summary="Store new Cash_Detail",
     *      description="Returns Cash_Detail data",
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
    public function store(Cash_DetailRequest $request)
    {
        //
        $cash_Detail = new Cash_Detail;
        $cash_Detail->cash_type_id = $request->cash_type_id;
        $cash_Detail->name         = $request->name;
        $cash_Detail->amount	   = $request->amount;
        $cash_Detail->date         = $request->date;
        $cash_Detail->save();
        return response([
            'data' => new Cash_DetailResource($cash_Detail)
    ],Response::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     *      path="/api/cash_details/{id}",
     *      operationId="getCash_DetailById",
     *      tags={"Cash_Detail"},
     *      summary="Get Cash_Detail information",
     *      description="Returns Cash_Detail data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Cash_Detail id",
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
     * @param  \App\Model\Cash_Detail  $cash_Detail
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // return $cash_Detail;
        // return new Cash_DetailResource($cash_Detail);
        $c=Cash_Detail::findorfail($id);
        return $c;
    }

    /**
     * @OA\Put(
     *      path="/api/cash_details/{id}",
     *      operationId="updateCash_Detail",
     *      tags={"Cash_Detail"},
     *      summary="Update existing Cash_Detail",
     *      description="Returns updated Cash_Detail data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Project id",
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
     * @param  \App\Model\Cash_Detail  $cash_Detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $a = Cash_Detail::findorfail($id);
        $a->update($request->all());
        return $a;
    }


     /**
     * @OA\Delete(
     *      path="/api/cash_details/{id}",
     *      operationId="deleteCash_Detail",
     *      tags={"Cash_Detail"},
     *      summary="Delete existing Cash_Detail",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Cash_Detail id",
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
     * @param  \App\Model\Cash_Detail  $cash_Detail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $a = Cash_Detail::findorfail($id);
        $a->delete();
        return ('item is deleted'); 
    }
}
