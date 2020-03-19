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

        $inputData = $request->all();
        $inputData['user_id'] = Auth::id();

        $insertId = PurchaseInvoice::max('id') + 1;
        $insertString = str_pad($insertId, 9, '0', STR_PAD_LEFT);
        $inputData['invoice_number'] = date('Y-m') . '-' . $insertString;

        $purchaseInvoice = PurchaseInvoice::create($inputData);
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

    // ********************************* Reports *********************************
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function report($from, $to, $supplier_id=0) {

        if(!Gate::allows('salesInvoice.view')) {
            abort(403, 'Sorry, permission denied!');
        }

        if ($supplier_id == 0) {
            return PurchaseInvoiceResource::collection(
                PurchaseInvoice::where('invoice_date', '>=', $from)
                ->where('invoice_date', '<=', $to)
                ->latest()->get()
            );
        } else {
            return PurchaseInvoiceResource::collection(
                PurchaseInvoice::where('invoice_date', '>=', $from)
            ->where('invoice_date', '<=', $to)
                ->where('supplier_id', '=', $supplier_id)
                ->latest()->get()
            );
        }

    }
}
