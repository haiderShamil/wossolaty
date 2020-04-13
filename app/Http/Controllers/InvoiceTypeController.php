<?php

namespace App\Http\Controllers;

use App\Model\Invoice_Type;
use Illuminate\Http\Request;
use App\Http\Resources\Invoice_Type\Invoice_TypeResource;
use App\Http\Requests\Invoice_TypeRequest;
use Symfony\Component\HttpFoundation\Response;
class InvoiceTypeController extends Controller
{

     /**
     * @OA\GET(
     *     path="/api/invoice_types",
     *      operationId="getInvoice_TypeList",
     *     tags={"Invoice_Type"},
     *     summary="Returns API response of all Invoice_Type",
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
        return Invoice_Type::all();

    }

     /**
     * @OA\Post(
     *      path="/api/invoice_types",
     *      operationId="storeInvoice_Type",
     *      tags={"Invoice_Type"},
     *      summary="Store new Invoice_Type",
     *      description="Returns Invoice_Type data",
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
    public function store(Invoice_TypeRequest $request)
    {
        //
        $invo_type = new Invoice_Type;
        $invo_type->name =$request->name;
        $invo_type->save();
        return response([
            'data' => new Invoice_TypeResource ($invo_type)
    ],Response::HTTP_CREATED);
        
    }

     /**
     * @OA\Get(
     *      path="/api/invoice_types/{id}",
     *      operationId="getInvoice_TypeById",
     *      tags={"Invoice_Type"},
     *      summary="Get Invoice_Type information",
     *      description="Returns Invoice_Type data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Invoice_Type id",
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
     * @param  \App\Model\Invoice_Type  $invoice_Type
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $a = Invoice_Type::findorfail($id);     
        return $a;
        // return $invoice_Type;
        // return new Invoice_TypeResource($invoice_Type);
    }

     /**
     * @OA\Put(
     *      path="/api/invoice_types/{id}",
     *      operationId="updateInvoice_Type",
     *      tags={"Invoice_Type"},
     *      summary="Update existing Invoice_Type",
     *      description="Returns updated Invoice_Type data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Invoice_Type id",
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
     * @param  \App\Model\Invoice_Type  $invoice_Type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $a = Invoice_Type::findorfail($id);        
        $a->update($request->all());
        return ($a);   
    }

    /**
     * @OA\Delete(
     *      path="/api/invoice_types/{id}",
     *      operationId="deleteInvoice_Type",
     *      tags={"Invoice_Type"},
     *      summary="Delete existing Invoice_Type",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Invoice_Type id",
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
     * @param  \App\Model\Invoice_Type  $invoice_Type
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $a = Invoice_Type::findorfail($id);
        $a->delete();
        return ('item is deleted');
    }
}
