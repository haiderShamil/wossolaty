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
  
}
