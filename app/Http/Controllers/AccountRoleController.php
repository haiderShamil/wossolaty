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
