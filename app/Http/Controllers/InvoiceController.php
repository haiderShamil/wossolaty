<?php

namespace App\Http\Controllers;

use App\Model\Invoice;
use App\Model\Account;
use App\Model\Product;

use Illuminate\Http\Request;
use App\Http\Resources\Invoice\InvoiceResource;
use App\Http\Requests\InvoiceRequest;
use Symfony\Component\HttpFoundation\Response;
class InvoiceController extends Controller
{

    /**
     * @OA\GET(
     *     path="/api/invoices",
     *      operationId="getInvoiceList",
     *     tags={"Invoice"},
     *     summary="Returns API response of all Invoice",
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
        return Invoice::all();

    }

    /**
     * @OA\Post(
     *      path="/api/invoices",
     *      operationId="storeInvoice",
     *      tags={"Invoice"},
     *      summary="Store new Invoice",
     *      description="Returns Invoice data",
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
    public function store(InvoiceRequest $request)
    {
        //

        $invoice = new Invoice;
        $invoice->invoice_type_id=$request->invoice_type_id;
        $invoice->payment_type_id=$request->payment_type_id;

        $invoice->account_id=$request->account_id;
        $invoice->product_id=$request->product_id;

        $id_a = $invoice->account_id;
        $account = Account::findorfail($id_a);

        $id_p = $invoice->product_id;
        $product = Product::findorfail($id_p);

        $invoice->accountname=$account->name;
        $invoice->productname=$product->name;

        if (invoice_type_id==3) {
            $invoice->price=$product->unit_price*-1;
        }
        else {$invoice->price=$product->unit_price;}
        $invoice->amount=$request->amount;
        if ( $invoice->invoice_type_id == 2)
        $product->qty= ($product->qty-$invoice->amount);
        elseif ($invoice->invoice_type_id == 3)
        $product->qty= ($product->qty+$invoice->amount);

        if ($product->qty < 0)
        return ('out of order');
        $invoice->total = ($invoice->price * $request->amount);

        if ($invoice->payment_type_id==2 && $invoice->invoice_type_id == 2)
        $account->sumdept = $account->sumdept +  $invoice->total;

        if ($invoice->payment_type_id==1 && $invoice->invoice_type_id == 3)
        $account->sumdept = $account->sumdept -  $invoice->total;

        $invoice->no = $request->no;

        $invoice->save();
        $account->update();
        $product->update();
        return  ($invoice);
    
    }

    /**
     * @OA\Get(
     *      path="/api/invoices/{id}",
     *      operationId="getInvoiceById",
     *      tags={"Invoice"},
     *      summary="Get Invoice information",
     *      description="Returns Invoice data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Invoice id",
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
     * @param  \App\Model\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
        return $invoice;
        return new InvoiceResource($invoice);
    }

    /**
     * @OA\Put(
     *      path="/api/invoices/{id}",
     *      operationId="updateInvoice",
     *      tags={"Invoice"},
     *      summary="Update existing Invoice",
     *      description="Returns updated Invoice data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Invoice id",
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
     * @param  \App\Model\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
        $invoice->update($request->all());
        return ($invoice);
    }

    /**
     * @OA\Delete(
     *      path="/api/invoices/{id}",
     *      operationId="deleteInvoicee",
     *      tags={"Invoice"},
     *      summary="Delete existing Invoice",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Invoice id",
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
     * @param  \App\Model\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
        $account->delete();
        return ('item is deleted');
    }

    /**
     * @OA\Get(
     *      path="/api/total/{id}",
     *      operationId="getInvoicetotalById",
     *      tags={"Invoice"},
     *      summary="Get total Invoice information",
     *      description="Returns total Invoice data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Invoice id",
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
    

    public function total($id)
    {
        //
         $invoice = Invoice::get()->where('no','like',$id);
         $total = 0;
        foreach ($invoice as $value)
        {
            $total = $total + $value->total;
        }
        return \response()->json([$invoice,'The total of invoice'=>$total]);

    }
}
