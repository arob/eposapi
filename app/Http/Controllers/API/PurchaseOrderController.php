<?php

namespace App\Http\Controllers\API;

use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItem;
use App\Http\Controllers\Controller;
use App\Http\Resources\PurchaseOrder\PurchaseOrderResource;
use App\Http\Requests\PurchaseOrder\PurchaseOrderCreateRequest;
use App\Http\Requests\PurchaseOrder\PurchaseOrderUpdateRequest;
use App\Http\Resources\PurchaseOrder\PurchaseOrderWithItemsResource;

class PurchaseOrderController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return PurchaseOrderResource::collection(
            PurchaseOrder::orderBy('created_at')->paginate()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PurchaseOrderCreateRequest $request) {
        $purchaseOrder = PurchaseOrder::create($request->all());

        $purchaseOrder->items()
            ->createMany($request->items);
    
        return new PurchaseOrderWithItemsResource($purchaseOrder);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseOrder $purchaseOrder) {
        return new PurchaseOrderWithItemsResource($purchaseOrder);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PurchaseOrderUpdateRequest $request,
        PurchaseOrder $purchaseOrder) {
        
        $purchaseOrder->update($request->all());
        $purchaseOrder->items()->delete();

        $purchaseOrder->items()->createMany($request->items);


        return new PurchaseOrderWithItemsResource($purchaseOrder);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseOrder $purchaseOrder) {
        //
    }
}
