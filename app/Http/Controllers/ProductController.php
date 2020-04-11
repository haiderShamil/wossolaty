<?php

namespace App\Http\Controllers;

use App\Model\Product;
use App\Model\Stock;
use Illuminate\Http\Request;
use App\Http\Resources\Product\ProductResource;
use App\Http\Requests\ProductRequest;

use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //
        $product = new Product;
        $product->name = $request->name;
        $product->unit_price = $request->unit_price;
        $product->pur_price = $request->pur_price;
        $product->model = $request->model;
        $product->description = $request->description;
        $product->expire = $request->expire;
        $product->production = $request->production;
        $product->qty = $request->qty;
        $product->unitinstock = $request->unitinstock;
        $product->min_qty = $request->min_qty;
        $product->max_qty = $request->max_qty;
        $product->stock_id = $request->stock_id;
        $product->product_states_id	 = $request->product_states_id;
        $product->save();
        return response([
                'data'=>new ProductResource($product)], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        // return $product;
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        // return $product->qty;
        $request['qty'] = $product->qty  + $request->qty ; 
        $product->update($request->all());
        return response([
            'data' => new ProductResource($product)
    ],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return ('item is deleted');
    }


    public function indexStore($id)
    {
        //
         $stock = Stock::get()->where('id','like',$id);
         $product = Product::get()->where('stock_id','like',$id);
         return [$stock,$product];

    }
}
