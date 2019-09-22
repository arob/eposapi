<?php

namespace App\Http\Controllers\API;

use App\Models\Manufacturer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Manufacturer\ManufacturerResource;
use App\Http\Requests\Manufacturer\ManufacturerCreateRequest;
use App\Http\Requests\Manufacturer\ManufacturerUpdateRequest;
use Gate;

class ManufacturerController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        if(!Gate::allows('manufacturer.view')) {
            abort(403, 'Sorry, permission denied!');
        }

        return ManufacturerResource::collection(
            Manufacturer::orderBy('name')->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManufacturerCreateRequest $request) {

        if(!Gate::allows('manufacturer.create')) {
            abort(403, 'Sorry, permission denied!');
        }

        $manufacturer = Manufacturer::create([
            'name' => $request->name,
            'short_name' => $request->short_name,
            'website' => $request->website,
            'country_id' => $request->country_id,
            'status' => true,
            'user_id' => Auth::id()
        ]);

        return new ManufacturerResource($manufacturer);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Manufacturer $manufacturer) {
        return new ManufacturerResource($manufacturer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(
        ManufacturerUpdateRequest $request, 
        Manufacturer $manufacturer) {

        if(!Gate::allows('manufacturer.update', $manufacturer)) {
            abort(403, 'Sorry, permission denied!');
        }

        $manufacturer->update($request->all());

        return new ManufacturerResource($manufacturer);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manufacturer $manufacturer) {
        // $manufacturer->delete();

        // return response()->json(null, 204);
        
    }
}
