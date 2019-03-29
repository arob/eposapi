<?php

namespace App\Http\Controllers\API;

use App\Models\Quotation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Quotation\QuotationResource;
use App\Http\Requests\Quotation\QuotationCreateRequest;
use App\Http\Requests\Quotation\QuotationUpdateRequest;
use App\Http\Resources\Quotation\QuotationWithItemsResource;

class QuotationController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return QuotationResource::collection(
            Quotation::orderBy('created_at')->paginate()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuotationCreateRequest $request) {

        $quotation = Quotation::create($request->all());

        $quotation->items()->createMany($request->items);

        return new QuotationWithItemsResource($quotation);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Quotation $quotation) {
        return new QuotationWithItemsResource($quotation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuotationUpdateRequest $request, 
    Quotation $quotation) {
        
        $quotation->update($request->all());
        $quotation->items()->delete();

        $quotation->items()->createMany($request->items);

        return new QuotationWithItemsResource($quotation);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
