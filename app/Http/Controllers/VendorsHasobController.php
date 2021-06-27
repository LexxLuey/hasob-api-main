<?php

namespace App\Http\Controllers;

use App\Models\VendorsHasob;
use Illuminate\Http\Request;

class VendorsHasobController extends Controller
{
    public function index()
    {
        $vendors = VendorsHasob::all();
 
        return response()->json([
            "success" => true,
            "message" => "Vendor List",
            "data" => $vendors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  "Vendor creation route working... are you surprised Mr Anderson?";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVendorRequest $request)
    {
        $validated = $request->validated();
        
        $vendor = new VendorsHasob();
        $vendor->name = $validated['name'];
        $vendor->category = $validated['category'];
        $vendor->save();

        // Fire event
        VendorCreated::dispatch($vendor->name, $vendor->category);

        // return response()->json([
        //     'data' => $validated
        // ]);

        return response()->json([
            "success" => true,
            "message" => "Vendor created successfully",
            "data" => $vendor
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $vendor = VendorsHasob::findOrFail($id);
        
        if (is_null($vendor)) {
            return $this->sendError('Vendor not found.');
        }
        
        return response()->json([
            "success" => true,
            "message" => "Vendor retrieved successfully.",
            "data" => $vendor
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json([
            "success" => true,
            "message" => "Vendor editing route working... don't you be surprised.",
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreVendorRequest $request, VendorsHasob $vendor)
    {
        $validated = $request->validated();

        $vendor->name = $validated['name'];
        $vendor->category = $validated['category'];
        $vendor->save();

        return response()->json([
            "success" => true,
            "message" => "Vendor updated successfully.",
            "data" => $vendor
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(VendorsHasob $vendor)
    {
        $vendor->delete();
        return response()->json([
            "success" => true,
            "message" => "Vendor deleted successfully.",
            "data" => $vendor
        ]);
    }
}
