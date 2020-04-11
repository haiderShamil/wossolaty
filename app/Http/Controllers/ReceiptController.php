<?php

namespace App\Http\Controllers;

use App\Model\Receipt;
use App\Model\Account;
use Illuminate\Http\Request;
use App\Http\Resources\Receipt\ReceiptResource;
use App\Http\Requests\ReceiptRequest;

use Symfony\Component\HttpFoundation\Response;
class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Receipt::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReceiptRequest $request)
    {
        //
        $receipt = new Receipt;
        $receipt->account_id = $request->account_id	;
        $id = $request->account_id;
        $account = Account::findorfail($id);
        $receipt->name = $account->name;
        $receipt->noreceipt	 = $request->noreceipt;
        $receipt->preaccount = $account->sumdept;
        $receipt->received = $request->received	;
        $receipt->postaccount = ($account->sumdept - $request->received);
        $receipt->date	 = $request->date	;

        $receipt->save();
        return response([
                'data'=>new ReceiptResource($receipt)],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function show(Receipt $receipt)
    {
        //
        // return $receipt;
        return new ReceiptResource($receipt);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receipt $receipt)
    {
        //
        $receipt->update($request->all());
        return response([
            'data' => new ReceiptResource($receipt)
    ],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receipt $receipt)
    {
        //
        $receipt->delete();
        return ('item is deleted');
    }
}
