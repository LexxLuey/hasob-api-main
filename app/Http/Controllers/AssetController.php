<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAssetRequest;
use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all the assets
        $assets = Asset::all();
        return response()->json($assets, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->json([
            "success" => true,
            "message" => "You look surprised to see Mr Anderson.",
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAssetRequest $request)
    {
        //create a new asset
        // $asset = new Asset();
        $asset = Asset::create([
            'type' => $request->type,
            'serial_number' => $request->serial_number,
            'description' => $request->description,
            'fixed_or_movable' => $request->fixed_or_movable,
            'picture_path' => $request->picture_path,
            'purchase_date' => $request->purchase_date,
            'start_use_date' => $request->start_use_date,
            'purchase_price' => $request->purchase_price,
            'warranty_expiry_date' => $request->warranty_expiry_date,
            'degradation_in_years' => $request->degradation_in_years,
            'current_value_naira' => $request->current_value_naira,
            'location' => $request->location,
        ]);

        AssetCreated::dispatch($asset->type, $asset->serial_number);


        return response()->json($asset, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(Asset $asset, $id)
    {
        //
        $assets = Asset::where($asset)->get();
        // $assets = Asset::findOrFail($id);
        return response()->json($assets, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(Asset $asset)
    {
        return response()->json([
            "success" => true,
            "message" => "Don't you just love it when routes work?",
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asset $asset)
    {
        //
        $asset = Asset::where('asset', $asset)->first();
        $asset->type = $request->type;
        $asset->serial_number = $request->serial_number;
        $asset->description = $request->description;
        $asset->fixed_or_movable = $request->fixed_or_movable;
        $asset->picture_path = $request->picture_path;
        $asset->purchase_date = $request->purchase_date;
        $asset->start_use_date = $request->start_use_date;
        $asset->purchase_price = $request->purchase_price;
        $asset->warranty_expiry_date = $request->warranty_expiry_date;
        $asset->degradation_in_years = $request->degradation_in_years;
        $asset->current_value_naira = $request->current_value_naira;
        $asset->location = $request->location;
        
        $asset->save();

        return response()->json($assets, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asset $asset)
    {
        $asset->delete();
        return response()->json([
            "success" => true,
            "message" => "User deleted successfully.",
            "data" => $asset
        ]);
    }
}
