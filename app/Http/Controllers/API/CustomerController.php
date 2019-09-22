<?php

namespace App\Http\Controllers\API;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Customer\CustomerCreateRequest;
use App\Http\Resources\Customer\CustomerResource;
use App\Http\Resources\Customer\CustomerWithInvoiceResource;

class CustomerController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        if(!Gate::allows('customer.view')) {
            abort(403, 'Sorry, permission denied!');
        }

        return CustomerResource::collection(
            Customer::orderBy('name')->paginate(10)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerCreateRequest $request) {


        if(!Gate::allows('customer.create')) {
            abort(403, 'Sorry, permission denied!');
        }
    
        $inputData = $request->all();
        $inputData['user_id'] = Auth::id();

        $customer = Customer::create($inputData);

        return new CustomerResource($customer);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer) {
        return new CustomerWithInvoiceResource($customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerCreateRequest $request, 
        Customer $customer) {

        if(!Gate::allows('customer.update', $customer)) {
            abort(403, 'Sorry, permission denied!');
        }

        $customer->update($request->all());

        return new CustomerResource($customer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        // $customer->delete();

        // return response()->json(null, 204);
    }
}
