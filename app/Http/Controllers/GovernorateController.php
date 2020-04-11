<?php

namespace App\Http\Controllers;

use App\Model\Governorate;
use Illuminate\Http\Request;
use App\Http\Resources\Governorate\GovernorateResource;
use App\Http\Requests\GovernorateRequest;
use Symfony\Component\HttpFoundation\Response;

class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Governorate::all();

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GovernorateRequest $request)
    {
        //
        $gov = new Governorate;
        $gov->name =$request->name;
        $gov->save();
        return response([
            'data' => new GovernorateResource($gov)
    ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Governorate  $governorate
     * @return \Illuminate\Http\Response
     */
    public function show(Governorate $governorate)
    {
        //
        // return $governorate;
        return new GovernorateResource($governorate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Governorate  $governorate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Governorate $governorate)
    {
        //
        $governorate->update($request->all());
        return response([
            'data' => new GovernorateResource($governorate)
    ],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Governorate  $governorate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Governorate $governorate)
    {
        //
        $governorate->delete();
        return ('item is deleted');
    }
}
