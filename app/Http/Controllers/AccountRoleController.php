<?php

namespace App\Http\Controllers;

use App\Model\Account_Role;
use Illuminate\Http\Request;
use App\Http\Resources\Account_Role\Account_RoleResource;
use App\Http\Requests\Account_RoleRequest;
use Symfony\Component\HttpFoundation\Response;


class AccountRoleController extends Controller
{

    /**
     * @OA\GET(
     *     path="/api/account_roles",
     *      operationId="getaccount_rolesList",
     *     tags={"Account_Role"},
     *     summary="Returns API response of all account_roles",
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
        return Account_Role::all();

    }

    /**
     * @OA\Post(
     *      path="/api/account_roles",
     *      operationId="storeAccount_Role",
     *      tags={"Account_Role"},
     *      summary="Store new account_roles",
     *      description="Returns account_roles data",
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
    public function store(Account_RoleRequest $request)
    {
        //
        $account_role = new Account_Role;
        $account_role->name =$request->name;
        $account_role->save();
        return response([
            'data' => new Account_RoleResource($account_role)
    ],Response::HTTP_CREATED);
        
    }

    /**
     * @OA\Get(
     *      path="/api/account_roles/{id}",
     *      operationId="getAccount_RoleById",
     *      tags={"Account_Role"},
     *      summary="Get account_role information",
     *      description="Returns account_role data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Account id",
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
     * @param  \App\Model\Account_Role  $account_Role
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $a = Account_Role::findorfail($id);     
        return $a;

        // return $account_Role;
        // return new Account_RoleResource($account_Role);
    }

    
     /**
     * @OA\Put(
     *      path="/api/account_roles/{id}",
     *      operationId="updateAccount_Role",
     *      tags={"Account_Role"},
     *      summary="Update existing Account_Role",
     *      description="Returns updated Account_Role data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Project id",
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
     * @param  \App\Model\Account_Role  $account_Role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $a = Account_Role::findorfail($id);        
        $a->update($request->all());
        return $a;
    }

    /**
     * @OA\Delete(
     *      path="/api/account_roles/{id}",
     *      operationId="deleteAccount_Role",
     *      tags={"Account_Role"},
     *      summary="Delete existing Account_Role",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Project id",
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
     * @param  \App\Model\Account_Role  $account_Role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $a = Account_Role::findorfail($id);
        $a->delete();
        return ('item is deleted');
    }
    
}
