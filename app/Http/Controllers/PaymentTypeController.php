<?php

namespace App\Http\Controllers;

use App\Model\Payment_Type;
use Illuminate\Http\Request;
use App\Http\Resources\Payment_Type\Payment_TypeResource;
use App\Http\Requests\Payment_TypeRequest;
use Symfony\Component\HttpFoundation\Response;
class PaymentTypeController extends Controller
{

    /**
     * @OA\GET(
     *     path="/api/payment_types",
     *      operationId="getPayment_TypeList",
     *     tags={"Payment_Type"},
     *     summary="Returns API response of all Payment_Type",
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
        return Payment_Type::all();

    }

    /**
     * @OA\Post(
     *      path="/api/payment_types",
     *      operationId="storePayment_Type",
     *      tags={"Payment_Type"},
     *      summary="Store new Payment_Type",
     *      description="Returns Payment_Type data",
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
    public function store(Payment_TypeRequest $request)
    {
        //
        $payment_Type = new Payment_Type;
        $payment_Type->name =$request->name;
        $payment_Type->save();
        return response([
            'data' => new Payment_TypeResource($payment_Type)
    ],Response::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     *      path="/api/payment_types/{id}",
     *      operationId="getPayment_TypeById",
     *      tags={"Payment_Type"},
     *      summary="Get Payment_Type information",
     *      description="Returns Payment_Type data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Payment_Type id",
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
     * @param  \App\Model\Payment_Type  $payment_Type
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $a = Payment_Type::findorfail($id);     
        return $a;
        // return $payment_Type;
        // return new Payment_TypeResource($payment_Type);
    }

    /**
     * @OA\Put(
     *      path="/api/payment_types/{id}",
     *      operationId="updatePayment_Type",
     *      tags={"Payment_Type"},
     *      summary="Update existing Payment_Type",
     *      description="Returns updated Payment_Type data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Payment_Type id",
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
     * @param  \App\Model\Payment_Type  $payment_Type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $a = Payment_Type::findorfail($id);
        $a->update($request->all());
        return $a;
    }

    /**
     * @OA\Delete(
     *      path="/api/payment_types/{id}",
     *      operationId="deletePayment_Type",
     *      tags={"Payment_Type"},
     *      summary="Delete existing Payment_Type",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Payment_Type id",
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
     * @param  \App\Model\Payment_Type  $payment_Type
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $a = Payment_Type::findorfail($id);
        $a->delete();
        return ('item is deleted');    
    }
}
