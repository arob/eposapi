<?php

namespace App\Http\Controllers\API;

use App\Models\SizeUnit;
// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SizeUnit\SizeUnitResource;
use App\Http\Requests\SizeUnit\SizeUnitCreateRequest;
use App\Http\Requests\SizeUnit\SizeUnitUpdateRequest;

class SizeUnitController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return SizeUnitResource::collection(
            SizeUnit::orderBy('name')->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SizeUnitCreateRequest $request) {

        $sizeUnit = SizeUnit::create($request->all());

        return new SizeUnitResource($sizeUnit);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SizeUnit $sizeUnit) {
        return new SizeUnitResource($sizeUnit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(
        SizeUnitUpdateRequest $request, 
        SizeUnit $sizeUnit) {

        $sizeUnit->update($request->all());

        return new SizeUnitResource($sizeUnit);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SizeUnit $sizeUnit) {
        // $sizeUnit->delete();

        // return response()->json(null, 204);

    }
}
