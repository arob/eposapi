<?php

namespace App\Http\Controllers\API;

use App\Models\Country;
use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResource;
use App\Http\Requests\Master\CountryCreateRequest;

class CountryController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return CountryResource::collection(
            Country::orderBy('name')->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryCreateRequest $request) {
        $country = Country::create([
            'name' => $request->name,
            'short_name' => $request->short_name
        ]);

        return new CountryResource($country);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country) {
        return new CountryResource($country);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CountryCreateRequest $request, Country $country) {
        $country->update($request->all());

        return new CountryResource($country);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country) {
        // $country->delete();

        // return response()->json(null, 204);
    }
}
