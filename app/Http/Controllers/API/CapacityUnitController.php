<?php

namespace App\Http\Controllers\API;

use App\Models\CapacityUnit;
// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CapacityUnit\CapacityUnitResource;
use App\Http\Requests\CapacityUnit\CapacityUnitCreateRequest;
use App\Http\Requests\CapacityUnit\CapacityUnitUpdateRequest;

class CapacityUnitController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return CapacityUnitResource::collection(
            CapacityUnit::orderBy('name')->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CapacityUnitCreateRequest $request) {

        $capacityUnit = CapacityUnit::create($request->all());

        return new CapacityUnitResource($capacityUnit);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CapacityUnit $capacityUnit) {
        return new CapacityUnitResource($capacityUnit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(
        CapacityUnitUpdateRequest $request, 
        CapacityUnit $capacityUnit) {

        $capacityUnit->update($request->all());

        return new CapacityUnitResource($capacityUnit);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CapacityUnit $capacityUnit) {
        // $capacityUnit->delete();

        // return response()->json(null, 204);

    }
}
