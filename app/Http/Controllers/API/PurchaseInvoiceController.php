<?php

namespace App\Http\Controllers\API;

use App\Models\PurchaseItem;
use Illuminate\Http\Request;
use App\Models\PurchaseInvoice;
use App\Http\Controllers\Controller;
use App\Http\Resources\PurchaseInvoice\PurchaseInvoiceResource;
use App\Http\Resources\PurchaseInvoice\PurchaseInvoiceCollection;
use App\Http\Requests\PurchaseInvoice\PurchaseInvoiceCreateRequest;
use App\Http\Requests\PurchaseInvoice\PurchaseInvoiceUpdateRequest;
use App\Http\Resources\PurchaseInvoice\PurchaseInvoiceWithItemsResource;

class PurchaseInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return PurchaseInvoiceResource::collection(
            PurchaseInvoice::paginate(10)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PurchaseInvoiceCreateRequest $request)
    {

        $purchaseInvoice = PurchaseInvoice::create([
            'invoice_number' => $request->invoice_number,
            'invoice_date' => $request->invoice_number,
            'supplier_id' => $request->supplier_id,
            'user_id' => $request->user_id,
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
    public function show(PurchaseInvoice $purchaseInvoice)
    {
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

        $itemsModel = [];

        foreach($request->items as $item) {
            $itemsModel[] = new PurchaseItem($item);
        }

        $purchaseInvoice->update($request->all());
        $purchaseInvoice->items()->delete();

        $purchaseInvoice->items()->saveMany($itemsModel);


        return new PurchaseInvoiceWithItemsResource($purchaseInvoice);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
