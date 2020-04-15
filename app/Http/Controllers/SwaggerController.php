<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SwaggerController extends Controller
{

    /**
     * @OA\Info(
     *     version="1.0.0",
     *     title="Wossolaty API Documentation",
     *     description="This is a wossolaty API Documentation",
     *     @OA\Contact(
     *         email="haidershamil@gmail"
     *     ),
     *     @OA\License(
     *         name="Apache 2.0",
     *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
     *     )
     * )
     * @OA\Server(
     *      url=L5_SWAGGER_CONST_HOST,
     *      description="Demo API Server"
     * )
     *
     * @OA\Tag(
     *     name="Account_Role",
     *     description="Sample APIs Everything about your Account_Role ",
     * )
     *
     * @OA\Tag(
     *     name="Account",
     *     description="Sample APIs Everything about your Account ",
     * )
     * @OA\Tag(
     *     name="Cash_Detail",
     *     description="Sample APIs Everything about your Cash_Detail ",
     * )
     * @OA\Tag(
     *     name="Cash_Type",
     *     description="Sample APIs Everything about your Cash_Type ",
     * )
    
     * @OA\Tag(
     *     name="Governorate",
     *     description="Sample APIs Everything about your Governorate ",
     * )
     * @OA\Tag(
     *     name="Invoice_Type",
     *     description="Sample APIs Everything about your Invoice_Type ",
     * )
     * @OA\Tag(
     *     name="Invoice",
     *     description="Sample APIs Everything about your Invoice ",
     * )
     * @OA\Tag(
     *     name="Payment_Type",
     *     description="Sample APIs Everything about your Payment_Type ",
     * )
     * @OA\Tag(
     *     name="Product_State",
     *     description="Sample APIs Everything about your Product_State ",
     * )
     * @OA\Tag(
     *     name="Product",
     *     description="Sample APIs Everything about your Product ",
     * )
     * @OA\Tag(
     *     name="Receipt",
     *     description="Sample APIs Everything about your Receipt ",
     * )
     * @OA\Tag(
     *     name="Stock",
     *     description="Sample APIs Everything about your Stock ",
     * )
     */
     /** 
      * @OA\SecurityScheme(
      *   securityScheme="api_key",
      *   type="apiKey",
      *   in="header",
      *   name="Authorization"
      * )
      */
}