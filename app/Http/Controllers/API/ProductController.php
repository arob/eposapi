<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Product\ProductResource;
use App\Http\Requests\Product\ProductCreateRequest;
use App\Http\Requests\Product\ProductUpdateRequest;


class ProductController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        if(!Gate::allows('product.view')) {
            abort(403, 'Sorry, permission denied!');
        }

        return ProductResource::collection(
            Product::orderBy('name')->get()
        );
    }

    public function salableProducts() {
        return ProductResource::collection(
            Product::orderBy('name')
            ->inStock()
            ->active()
            ->get()
        );
    }


    public function activeProducts() {
        return ProductResource::collection(
            Product::orderBy('name')->active()->get()
        );
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request) {

        if(!Gate::allows('product.create')) {
            abort(403, 'Sorry, permission denied!');
        }

        $maxId = Product::max('id') ? Product::max('id') : 1;
        $insertCode = date('Y') . '-' . str_pad($maxId, 6, '0', STR_PAD_LEFT);


        $inputData = $request->all();

        $inputData['code'] = $insertCode;
        $inputData['user_id'] = Auth::id();


        $product = Product::create($inputData);

        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product) {

        return new ProductResource($product);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, 
        Product $product) {
        if (!Gate::allows('product.update', $product)) {
            abort(403, 'Sorry, permission denied!');
        }
        $product->update($request->all());

        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product) {
        //
    }

    // *********************************** Report functions ****************************
    /**
     * Lists all purchased products
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productStockReport() {

        $records = DB::table('vu_product_purchase')->get();
            
        return response()->json(['data' => $records], 200);

    }

    /**
     * Lists all sold products
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productSoldReport() {

        $records = DB::table('vu_product_sales')->get();
            
        return response()->json(['data' => $records], 200);

    }
    
}
