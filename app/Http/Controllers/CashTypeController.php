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
