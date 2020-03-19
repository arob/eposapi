<?php

namespace App\Http\Controllers\API;

use App\Models\SalesItem;
use App\Models\SalesInvoice;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
// use Illuminate\Support\Facades\DB;
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

        if(!Gate::allows('salesInvoice.view')) {
            abort(403, 'Sorry, permission denied!');
        }

        return SalesInvoiceResource::collection(
            SalesInvoice::latest()->get()
        );

        // return SalesInvoice::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalesInvoiceCreateRequest $request) {

        if(!Gate::allows('salesInvoice.create')) {
            abort(403, 'Sorry, permission denied!');
        }

        $inputData = $request->all();
        $inputData['user_id'] = Auth::id();

        $insertId = SalesInvoice::max('id') + 1;
        $insertString = str_pad($insertId, 9, '0', STR_PAD_LEFT);

        $inputData['invoice_number'] = date('Y-m') . '-' . $insertString;


        $salesInvoice = SalesInvoice::create($inputData);

        $salesInvoice->items()->createMany($request->items);
        $salesInvoice->installments()->createMany($request->installments);

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

        if(!Gate::allows('salesInvoice.update', $salesInvoice)) {
            abort(403, 'Sorry, permission denied!');
        }

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



    // ********************************************** Report Functions *****************************************
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function salesInvoiceReport($from, $to, $customer_id=0, $user_id=0) {

        if(!Gate::allows('salesInvoice.view')) {
            abort(403, 'Sorry, permission denied!');
        }

        if ($customer_id == 0 and $user_id == 0) {
            return SalesInvoiceResource::collection(
                SalesInvoice::where('invoice_date', '>=', $from)
                ->where('invoice_date', '<=', $to)
                ->latest()->get()
            );
        } else if($customer_id != 0 and $user_id == 0) {
            return SalesInvoiceResource::collection(
                SalesInvoice::where('invoice_date', '>=', $from)
                ->where('invoice_date', '<=', $to)
                ->where('customer_id', '=', $customer_id)
                ->latest()->get()
            );
        } else if($customer_id == 0 and $user_id != 0) {
            return SalesInvoiceResource::collection(
                SalesInvoice::where('invoice_date', '>=', $from)
                ->where('invoice_date', '<=', $to)
                ->where('user_id', '=', $user_id)
                ->latest()->get()
            );            
        } else if($customer_id != 0 and $user_id != 0) {
            return SalesInvoiceResource::collection(
                SalesInvoice::where('invoice_date', '>=', $from)
                ->where('invoice_date', '<=', $to)
                ->where('customer_id', '=', $customer_id)
                ->where('user_id', '=', $user_id)
                ->latest()->get()
            );

        }

    }


    
}
