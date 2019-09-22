<?php

namespace App\Http\Controllers\API;

use App\Models\AccHead;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AccHead\AccHeadCreateRequest;
use App\Http\Requests\AccHead\AccHeadUpdateRequest;
use App\Http\Resources\AccHead\AccHeadWithCategoryResource;

class AccHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return AccHead::all();

        // return response()->json(['data' => AccHead::all(), 'message' => 'success']);
        return AccHeadWithCategoryResource::collection(
            AccHead::orderBy('name')->get()
        );
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccHeadCreateRequest $request)
    {
        $accHead = AccHead::create($request->all());
        
        return new AccHeadWithCategoryResource($accHead);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AccHeadUpdateRequest $request, AccHead $accHead)
    {

        $accHead->update($request->all());

        return new AccHeadWithCategoryResource($accHead);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
