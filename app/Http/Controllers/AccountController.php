<?php

namespace App\Http\Controllers;

use App\Model\Account;
use Illuminate\Http\Request;
use App\Http\Resources\Account\AccountResource;
use App\Http\Resources\Account\AccountCollection;
use App\Http\Requests\AccountRequest;
use Symfony\Component\HttpFoundation\Response;

class AccountController extends Controller
{
     /**
     * @OA\GET(
     *     path="/api/accounts",
     *      operationId="getProjectsList",
     *     tags={"Account"},
     *     summary="Returns API response of all accounts",
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
        return Account::all();
        // return AccountCollection::collection(Account::all());
        // return AccountResource::collection(Account::all());
    }

    /**
     * @OA\Post(
     *      path="/api/accounts",
     *      operationId="storeAccount",
     *      tags={"Account"},
     *      summary="Store new account",
     *      description="Returns account data",
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
    public function store(AccountRequest $request)
    {
        //
        $account = new Account;
        $account->account_role_id = $request->account_role_id;
        $account->governate_id = $request->governate_id;
        $account->name = $request->name;
        $account->sumdept = $request->sumdept;
        $account->phone	= $request->phone;
        $account->address = $request->address;
        $account->dateadd = $request->dateadd;
        $account->note = $request->note;
        $account->save();
        return response([
            'data' => new AccountResource($account)
    ],Response::HTTP_CREATED);
    }
    /**
     * @OA\Get(
     *      path="/api/accounts/{id}",
     *      operationId="getAccountById",
     *      tags={"Account"},
     *      summary="Get account information",
     *      description="Returns account data",
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
     * @param  \App\Model\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
        // return $account;
        return new AccountResource($account);
    }

     /**
     * @OA\Put(
     *      path="/api/accounts/{id}",
     *      operationId="updateAccount",
     *      tags={"Account"},
     *      summary="Update existing account",
     *      description="Returns updated account data",
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
     * @param  \App\Model\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        //
        $account->update($request->all());
        return response([
            'data' => new AccountResource($account)
    ],Response::HTTP_CREATED);
    }

     /**
     * @OA\Delete(
     *      path="/api/accounts/{id}",
     *      operationId="deleteAccount",
     *      tags={"Account"},
     *      summary="Delete existing account",
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
     * @param  \App\Model\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
        $account->delete();
        return ('item is deleted');
    }
    public function sumdept( Request $request)
    {
        if ($request->name == 'pos')
        {
            $acc = Account::get()->where('sumdept','>',0);
            $accp = 0;
            foreach ($acc as $value)
            {
                $accp += $value->sumdept;
            }
            return  response()->json( ['sum of dept'=>$accp,'account'=>$acc]);
        }
        elseif ($request->name == 'neg') {
            $acc = Account::get()->where('sumdept','<',0);
            $accp = 0;
            foreach ($acc as $value)
            {
                $accp += $value->sumdept;
            }
            return  response()->json( ['sum of dept'=>$accp,'account'=>$acc]);
        }
    }
  
}
