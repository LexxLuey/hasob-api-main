<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::all();
 
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
        return  "Vendor creation route working... are you surprised?";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $validated = $request->validated();
        
        $vendor = new Vendor();
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
        $vendor = Vendor::findOrFail($id);
        
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
    public function update(StoreVendorRequest $request, Vendor $vendor)
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
    public function destroy(Vendor $vendor)
    {
        $vendor->delete();
        return response()->json([
            "success" => true,
            "message" => "Vendor deleted successfully.",
            "data" => $vendor
        ]);
    }
}
