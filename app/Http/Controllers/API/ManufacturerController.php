<?php

namespace App\Http\Controllers\API;

use App\Models\Manufacturer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Manufacturer\ManufacturerResource;
use App\Http\Requests\Manufacturer\ManufacturerCreateRequest;
use App\Http\Requests\Manufacturer\ManufacturerUpdateRequest;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
    public function store(ManufacturerCreateRequest $request)
    {
        $manufacturer = Manufacturer::create($request->all());

        return new ManufacturerResource($manufacturer);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Manufacturer $manufacturer)
    {
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
        Manufacturer $manufacturer)
    
    {
        $manufacturer->update($request->all());

        return new ManufacturerResource($manufacturer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manufacturer $manufacturer)
    {
        $manufacturer->delete();

        return response()->json(null, 204);
        
    }
}
