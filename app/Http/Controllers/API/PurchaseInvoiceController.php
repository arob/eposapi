<?php

namespace App\Http\Controllers\API;

use App\Models\PurchaseItem;
use App\Models\PurchaseInvoice;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\PurchaseInvoice\PurchaseInvoiceResource;
use App\Http\Requests\PurchaseInvoice\PurchaseInvoiceCreateRequest;
use App\Http\Requests\PurchaseInvoice\PurchaseInvoiceUpdateRequest;
use App\Http\Resources\PurchaseInvoice\PurchaseInvoiceWithItemsResource;

class PurchaseInvoiceController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        if(!Gate::allows('purchaseInvoice.view')) {
            abort(403, 'Sorry, permission denied!');
        }
        
        return PurchaseInvoiceResource::collection(
            PurchaseInvoice::latest()->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PurchaseInvoiceCreateRequest $request) {

        if(!Gate::allows('purchaseInvoice.create')) {
            abort(403, 'Sorry, permission denied!');
        }

        $purchaseInvoice = PurchaseInvoice::create([
            'invoice_number' => $request->invoice_number,
            'invoice_date' => $request->invoice_date,
            'supplier_id' => $request->supplier_id,
            'invoice_total' => $request->invoice_total,
            'paid_amount' => $request->paid_amount,
            'user_id' => Auth::id(),
            'notes' => $request->notes
        ]);

        $purchaseInvoice->items()->createMany($request->items);

        return new PurchaseInvoiceWithItemsResource($purchaseInvoice);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseInvoice $purchaseInvoice) {
        return new PurchaseInvoiceWithItemsResource($purchaseInvoice);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(
        
        PurchaseInvoiceUpdateRequest $request, 
        PurchaseInvoice $purchaseInvoice) {

        if(!Gate::allows('purchaseInvoice.update', $purchaseInvoice)) {
            abort(403, 'Sorry, permission denied!');
        }

        $purchaseInvoice->update($request->all());
        $purchaseInvoice->items()->delete();

        $purchaseInvoice->items()->createMany($request->items);


        return new PurchaseInvoiceWithItemsResource($purchaseInvoice);
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
