<?php

namespace App\Http\Controllers\API;

use App\Models\District;
use App\Http\Controllers\Controller;
use App\Http\Resources\District\DistrictResource;
use App\Http\Requests\District\DistrictCreateRequest;
use App\Http\Requests\District\DistrictUpdateRequest;

class DistrictController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return DistrictResource::collection(District::orderBy('name')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DistrictCreateRequest $request) {
        $district = District::create($request->all());

        return new DistrictResource($district);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(District $district) {
        return new DistrictResource($district);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(
        DistrictUpdateRequest $request, 
        District $district) {
            
        $district->update($request->all());

        return new DistrictResource($district); 
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
