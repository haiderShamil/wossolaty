<?php

namespace App\Http\Controllers;

use App\Model\Governorate;
use Illuminate\Http\Request;
use App\Http\Resources\Governorate\GovernorateResource;
use App\Http\Requests\GovernorateRequest;
use Symfony\Component\HttpFoundation\Response;

class GovernorateController extends Controller
{

     /**
     * @OA\GET(
     *     path="/api/governorates",
     *      operationId="getGovernorateList",
     *     tags={"Governorate"},
     *     summary="Returns API response of all Governorate",
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
        return Governorate::all();

    }

    /**
     * @OA\Post(
     *      path="/api/governorates",
     *      operationId="storeGovernorate",
     *      tags={"Governorate"},
     *      summary="Store new Governorate",
     *      description="Returns Governorate data",
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
    public function store(GovernorateRequest $request)
    {
        //
        $gov = new Governorate;
        $gov->name =$request->name;
        $gov->save();
        return response([
            'data' => new GovernorateResource($gov)
    ],Response::HTTP_CREATED);
    }


     /**
     * @OA\Get(
     *      path="/api/governorates/{id}",
     *      operationId="getGovernorateById",
     *      tags={"Governorate"},
     *      summary="Get Governorate information",
     *      description="Returns Governorate data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Governorate id",
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
     * @param  \App\Model\Governorate  $governorate
     * @return \Illuminate\Http\Response
     */
    public function show(Governorate $governorate)
    {
        //
        // return $governorate;
        return new GovernorateResource($governorate);
    }

      /**
     * @OA\Put(
     *      path="/api/governorates/{id}",
     *      operationId="updateGovernorate",
     *      tags={"Governorate"},
     *      summary="Update existing Governorate",
     *      description="Returns updated Governorate data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Governorate id",
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
     * @param  \App\Model\Governorate  $governorate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Governorate $governorate)
    {
        //
        $governorate->update($request->all());
        return response([
            'data' => new GovernorateResource($governorate)
    ],Response::HTTP_CREATED);
    }

    /**
     * @OA\Delete(
     *      path="/api/governorates/{id}",
     *      operationId="deleteGovernorate",
     *      tags={"Governorate"},
     *      summary="Delete existing Governorate",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Governorate id",
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
     * @param  \App\Model\Governorate  $governorate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Governorate $governorate)
    {
        //
        $governorate->delete();
        return ('item is deleted');
    }
}
