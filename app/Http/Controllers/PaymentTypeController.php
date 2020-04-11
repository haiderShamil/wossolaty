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
