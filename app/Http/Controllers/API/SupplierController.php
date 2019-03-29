<?php

namespace App\Http\Controllers\API;

use App\Models\Supplier;
use App\Http\Controllers\Controller;
use App\Http\Resources\Supplier\SupplierResource;
use App\Http\Requests\Supplier\SupplierCreateRequest;
use App\Http\Requests\Supplier\SupplierUpdateRequest;

class SupplierController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return SupplierResource::collection(
            Supplier::orderBy('name')->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplierCreateRequest $request) {

        $supplier =  Supplier::create($request->all());

        return new SupplierResource($supplier);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier) {
        return new SupplierResource($supplier);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SupplierUpdateRequest $request, 
        Supplier $supplier) {

        $supplier->update($request->all());

        return new SupplierResource($supplier);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier) {
        // $supplier->delete();

        // return response()->json(null, 204);
    }
}
