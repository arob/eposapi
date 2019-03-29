<?php

namespace App\Http\Controllers\API;

use App\Models\SalesItem;
use App\Models\SalesInvoice;
use App\Http\Controllers\Controller;
use App\Http\Resources\SalesInvoice\SalesInvoiceResource;
use App\Http\Requests\SalesInvoice\SalesInvoiceCreateRequest;
use App\Http\Requests\SalesInvoice\SalesInvoiceUpdateRequest;
use App\Http\Resources\SalesInvoice\SalesInvoiceWithItemsResource;

class SalesInvoiceController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return SalesInvoiceResource::collection(
            SalesInvoice::orderBy('created_at')
                ->paginate(10)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalesInvoiceCreateRequest $request) {

        $salesInvoice = SalesInvoice::create($request->all());

        $salesInvoice->items()->createMany($request->items);

        return new SalesInvoiceWithItemsResource($salesInvoice);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SalesInvoice $salesInvoice) {
        return new SalesInvoiceWithItemsResource($salesInvoice);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SalesInvoiceUpdateRequest $request, 
        SalesInvoice $salesInvoice) {

        $salesInvoice->update($request->all());
        $salesInvoice->items()->delete();

        $salesInvoice->items()->createMany($request->items);


        return new SalesInvoiceWithItemsResource($salesInvoice);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalesInvoice $salesInvoice) {
        //
    }
}
