<?php

namespace App\Http\Controllers;

use App\Model\Product_State;
use Illuminate\Http\Request;
use App\Http\Resources\Product_State\Product_StateResource;
use App\Http\Requests\Product_StateRequest;
use Symfony\Component\HttpFoundation\Response;
class ProductStateController extends Controller
{

    /**
     * @OA\GET(
     *     path="/api/products_states",
     *      operationId="getProduct_StateList",
     *     tags={"Product_State"},
     *     summary="Returns API response of all Product_State",
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
        return Product_State::all();

    }

    /**
     * @OA\Post(
     *      path="/api/products_states",
     *      operationId="storeProduct_State",
     *      tags={"Product_State"},
     *      summary="Store new Product_State",
     *      description="Returns Product_State data",
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
    public function store(Product_StateRequest $request)
    {
        //
        $product_State = new Product_State;
        $product_State->name =$request->name;
        $product_State->save();
        return response([
            'data' => new Product_StateResource($product_State)
    ],Response::HTTP_CREATED);
    }


    /**
     * @OA\Get(
     *      path="/api/products_states/{id}",
     *      operationId="getProduct_StateById",
     *      tags={"Product_State"},
     *      summary="Get Product_State information",
     *      description="Returns Product_State data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Product_State id",
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
     * @param  \App\Model\Product_State  $product_State
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $a = Product_State::findorfail($id);     
        return $a;
        // return $product_State;
        return new Product_StateResource($product_State);
    }

    /**
     * @OA\Put(
     *      path="/api/products_states/{id}",
     *      operationId="updateProduct_State",
     *      tags={"Product_State"},
     *      summary="Update existing Product_State",
     *      description="Returns updated Product_State data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Product_State id",
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
     * @param  \App\Model\Product_State  $product_State
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $a = Product_State::findorfail($id);
        $a->update($request->all());
        return $a;
    }

     /**
     * @OA\Delete(
     *      path="/api/products_states/{id}",
     *      operationId="deleteProduct_State",
     *      tags={"Product_State"},
     *      summary="Delete existing Product_State",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Product_State id",
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
     * @param  \App\Model\Product_State  $product_State
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $a = Product_State::findorfail($id);
        $a->delete();
        return ('item is deleted');    
    }
}
