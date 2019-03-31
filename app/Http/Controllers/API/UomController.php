<?php

namespace App\Http\Controllers\API;

use App\Models\Uom;
use App\Http\Controllers\Controller;
use App\Http\Resources\Uom\UomResource;
use App\Http\Requests\Uom\UomCreateRequest;
use App\Http\Requests\Uom\UomUpdateRequest;

class UomController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        return UomResource::collection(
            Uom::orderBy('name')->get()
        );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\UomCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UomCreateRequest $request) {

        $uom = Uom::create($request->all());

        return new UomResource($uom);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Uom $uom) {

        return new UomResource($uom);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UomUpdateRequest $request, 
        Uom $uom) {

        $uom->update($request->all());

        return new UomResource($uom);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Uom $uom) {

        // $uom->delete();

        // return response()->json(null, 204);
    }
}
