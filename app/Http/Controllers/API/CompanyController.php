<?php

namespace App\Http\Controllers\API;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Company\CompanyResource;
use App\Http\Requests\Company\CompanyCreateRequest;
use App\Http\Requests\Company\CompanyUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Gate;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::limit(1)->get();

        return new CompanyResource($company);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyCreateRequest $request)
    {

        if(!Gate::allows('company.create')) {
            abort(403, 'Sorry, permission denied!');
        }

        $company = Company::create([
            'name' => $request->name,
            'short_name' => $request->short_name,
            'address' => $request->address,
            'contact_number' => $request->contact_number
        ]);

        return new CompanyResource($company);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {

        if(!Gate::allows('company.view')) {
            abort(403, 'Sorry, permission denied!');
        }

        return new CompanyResource($company);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyUpdateRequest $request, Company $company)
    {

        if(!Gate::allows('company.update', $company)) {
            abort(403, 'Sorry, permission denied!');
        }

        $company->update($request->all());

        return new CompanyResource($company);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
