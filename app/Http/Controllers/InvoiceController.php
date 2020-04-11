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

        $invoice->price=$product->unit_price;
        $invoice->amount=$request->amount;
        if ( $invoice->invoice_type_id == 2)
        $product->qty= ($product->qty-$invoice->amount);
        if ($product->qty < 0)
        return ('out of order');
        $invoice->total = ($request->price * $request->amount);

        if ($invoice->payment_type_id==2 && $invoice->invoice_type_id == 2)
        $account->sumdept = $account->sumdept +  $invoice->total;

        $invoice->no = $request->no;

        $invoice->save();
        $account->update();
        $product->update();
        return  ($invoice);
    
    }

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
