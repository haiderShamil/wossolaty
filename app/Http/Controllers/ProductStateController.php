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
