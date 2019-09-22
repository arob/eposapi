<?php

namespace App\Http\Controllers\API;

use App\Models\Supplier;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
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

        if(!Gate::allows('supplier.view')) {
            abort(403, 'Sorry, permission denied!');
        }

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

        if(!Gate::allows('supplier.create')) {
            abort(403, 'Sorry, permission denied!');
        }

        $inputData = $request->all();
        $inputData['user_id'] = Auth::id();

        $supplier =  Supplier::create($inputData);

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

        if (!Gate::allows('supplier.update', $supplier)) {
            abort(403, 'Sorry, permission denied!');
        }

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
