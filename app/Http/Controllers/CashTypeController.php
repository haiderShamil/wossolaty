<?php

namespace App\Http\Controllers;

use App\Model\Cash_Type;
use Illuminate\Http\Request;
use App\Http\Resources\Cash_Type\Cash_TypeResource;
use App\Http\Requests\Cash_TypeRequest;
use Symfony\Component\HttpFoundation\Response;

class CashTypeController extends Controller
{
    /**
     * @OA\GET(
     *     path="/api/cash_types",
     *      operationId="getCash_TypeList",
     *     tags={"Cash_Type"},
     *     summary="Returns API response of all Cash_Type",
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
        return Cash_Type::all();

    }

    /**
     * @OA\Post(
     *      path="/api/cash_types",
     *      operationId="storeCash_Type",
     *      tags={"Cash_Type"},
     *      summary="Store new Cash_Type",
     *      description="Returns Cash_Type data",
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
    public function store(Cash_TypeRequest $request)
    {
        //
        $cash_type = new Cash_Type;
        $cash_type->name =$request->name;
        $cash_type->save();
        return response([
            'data' => new Cash_TypeResource($cash_type)
    ],Response::HTTP_CREATED);
    }


    /**
     * @OA\Get(
     *      path="/api/cash_types/{id}",
     *      operationId="getCash_TypeById",
     *      tags={"Cash_Type"},
     *      summary="Get Cash_Type information",
     *      description="Returns Cash_Type data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Cash_Type id",
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
     * @param  \App\Model\Cash_Type  $cash_Type
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $a = Cash_Type::findorfail($id);     
        return $a;
        // return $cash_Type;
        // return new Cash_TypeResource($cash_Type);
        
    }

    /**
     * @OA\Put(
     *      path="/api/cash_types/{id}",
     *      operationId="updateCash_Type",
     *      tags={"Cash_Type"},
     *      summary="Update existing Cash_Type",
     *      description="Returns updated Cash_Type data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Cash_Type id",
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
     * @param  \App\Model\Cash_Type  $cash_Type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $a = Cash_Type::findorfail($id);
        $a->update($request->all());
        return $a;
    }

    /**
     * @OA\Delete(
     *      path="/api/cash_types/{id}",
     *      operationId="deleteCash_Type",
     *      tags={"Cash_Type"},
     *      summary="Delete existing Cash_Type",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Cash_Type id",
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
     * @param  \App\Model\Cash_Type  $cash_Type
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $a = Cash_Type::findorfail($id);
        $a->delete();
        return ('item is deleted');
    }
}
