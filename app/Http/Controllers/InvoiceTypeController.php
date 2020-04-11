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
