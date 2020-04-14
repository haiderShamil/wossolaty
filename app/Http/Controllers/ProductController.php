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
     * @OA\GET(
     *     path="/api/products",
     *      operationId="getProductList",
     *     tags={"Product"},
     *     summary="Returns API response of all Product",
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
        return Product::all();
    }

    /**
     * @OA\Post(
     *      path="/api/products",
     *      operationId="storeProduct",
     *      tags={"Product"},
     *      summary="Store new Product",
     *      description="Returns Product data",
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
     * @OA\Get(
     *      path="/api/products/{id}",
     *      operationId="getProductById",
     *      tags={"Product"},
     *      summary="Get Product information",
     *      description="Returns Product data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Product id",
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
     * @OA\Put(
     *      path="/api/products/{id}",
     *      operationId="updateProduct",
     *      tags={"Product"},
     *      summary="Update existing Product",
     *      description="Returns updated Product data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Product id",
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
     * @OA\Delete(
     *      path="/api/products/{id}",
     *      operationId="deleteProduct",
     *      tags={"Product"},
     *      summary="Delete existing Product",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Product id",
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
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return ('item is deleted');
    }

    /**
     * @OA\Get(
     *      path="/api/indexStore/{id}",
     *      operationId="getindexStoreById",
     *      tags={"Product"},
     *      summary="Get Products of some store information",
     *      description="Returns Products of some store data",
     *      @OA\Parameter(
     *          name="id",
     *          description="store id",
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

     


    public function indexStore($id)
    {
        //
         $stock = Stock::get()->where('id','like',$id);
         $product = Product::get()->where('stock_id','like',$id);
         return [$stock,$product];
         return  response()->json( ['stock'=>$stock,'product'=>$product]);


    }

    public function someproducts (Request $request)
    {
        $product = Product::get()->where('name','like',$request->name);
        $sum = 0;
        foreach ($product as $value)
        {
            $sum = $sum + $value->qty;
        }
        return  response()->json( ['name of product'=>$value->name,'sum'=>$sum]);

    }
}
