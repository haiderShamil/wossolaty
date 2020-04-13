<?php

namespace App\Http\Controllers;

use App\Model\Receipt;
use App\Model\Account;
use Illuminate\Http\Request;
use App\Http\Resources\Receipt\ReceiptResource;
use App\Http\Requests\ReceiptRequest;

use Symfony\Component\HttpFoundation\Response;
class ReceiptController extends Controller
{

    /**
     * @OA\GET(
     *     path="/api/receipts",
     *      operationId="getReceiptList",
     *     tags={"Receipt"},
     *     summary="Returns API response of all Receipt",
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
        return Receipt::all();

    }

    /**
     * @OA\Post(
     *      path="/api/receipts",
     *      operationId="storeReceipt",
     *      tags={"Receipt"},
     *      summary="Store new Receipt",
     *      description="Returns Receipt data",
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
    public function store(ReceiptRequest $request)
    {
        //
        $receipt = new Receipt;
        $receipt->account_id = $request->account_id	;
        $id = $request->account_id;
        $account = Account::findorfail($id);
        $receipt->name = $account->name;
        $receipt->noreceipt	 = $request->noreceipt;
        $receipt->preaccount = $account->sumdept;
        $receipt->received = $request->received	;
        $receipt->postaccount = ($account->sumdept - $request->received);
        $receipt->date	 = $request->date	;

        $receipt->save();
        return response([
                'data'=>new ReceiptResource($receipt)],Response::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     *      path="/api/receipts/{id}",
     *      operationId="getReceiptById",
     *      tags={"Receipt"},
     *      summary="Get Receipt information",
     *      description="Returns Receipt data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Receipt id",
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
     * @param  \App\Model\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function show(Receipt $receipt)
    {
        //
        // return $receipt;
        return new ReceiptResource($receipt);
    }

    /**
     * @OA\Put(
     *      path="/api/receipts/{id}",
     *      operationId="updateReceipt",
     *      tags={"Receipt"},
     *      summary="Update existing Receipt",
     *      description="Returns updated Receipt data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Receipt id",
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
     * @param  \App\Model\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receipt $receipt)
    {
        //
        $receipt->update($request->all());
        return response([
            'data' => new ReceiptResource($receipt)
    ],Response::HTTP_CREATED);
    }

    /**
     * @OA\Delete(
     *      path="/api/receipts/{id}",
     *      operationId="deleteReceipt",
     *      tags={"Receipt"},
     *      summary="Delete existing Receipt",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Receipt id",
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
     * @param  \App\Model\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receipt $receipt)
    {
        //
        $receipt->delete();
        return ('item is deleted');
    }
}
