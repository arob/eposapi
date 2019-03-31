<?php

namespace App\Http\Controllers\API;

use App\Models\Thana;
use App\Http\Controllers\Controller;
use App\Http\Resources\Thana\ThanaResource;
use App\Http\Requests\Thana\ThanaCreateRequest;
use App\Http\Requests\Thana\ThanaUpdateRequest;

class ThanaController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return ThanaResource::collection(Thana::orderBy('name')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThanaCreateRequest $request) {
        
        $thana = Thana::create($request->all());

        return new ThanaResource($thana);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Thana $thana) {

        return new ThanaResource($thana);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ThanaUpdateRequest $request, 
        Thana $thana) {

        $thana->update($request->all());

        return new ThanaResource($thana);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
