<?php

namespace App\Http\Controllers;

use App\Model\Cash_Detail;
use Illuminate\Http\Request;
use App\Http\Resources\Cash_Detail\Cash_DetailResource;
use App\Http\Requests\Cash_DetailRequest;
use Symfony\Component\HttpFoundation\Response;

class CashDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Cash_Detail::all();

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Cash_DetailRequest $request)
    {
        //
        $cash_Detail = new Cash_Detail;
        $cash_Detail->cash_type_id = $request->cash_type_id;
        $cash_Detail->name         = $request->name;
        $cash_Detail->amount	   = $request->amount;
        $cash_Detail->date         = $request->date;
        $cash_Detail->save();
        return response([
            'data' => new Cash_DetailResource($cash_Detail)
    ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Cash_Detail  $cash_Detail
     * @return \Illuminate\Http\Response
     */
    public function show(Cash_Detail $cash_Detail)
    {
        //
        // return $cash_Detail;
        return new Cash_DetailResource($cash_Detail);
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Cash_Detail  $cash_Detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $a = Cash_Detail::findorfail($id);
        $a->update($request->all());
        return $a;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Cash_Detail  $cash_Detail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $a = Cash_Detail::findorfail($id);
        $a->delete();
        return ('item is deleted'); 
    }
}
