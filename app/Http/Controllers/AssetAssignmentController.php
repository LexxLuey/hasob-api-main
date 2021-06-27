<?php

namespace App\Http\Controllers;

use App\Models\AssetAssignment;
use Illuminate\Http\Request;

class AssetAssignmentController extends Controller
{
    public function index()
    {
        $assetAssignment = AssetAssignment::all();
 
        return response()->json([
            "success" => true,
            "message" => "AssetAssignment List",
            "data" => $assetAssignment
        ]);
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
            "message" => "AssetAssignment creation route working... are you surprised?",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAssetAssignmentRequest $request)
    {
        $validated = $request->validated();
        
        $assetAssignment = new AssetAssignment();
        $assetAssignment->asset_id = $validated['asset_id'];
        $assetAssignment->assigned_user_id = $validated['assigned_user_id'];
        $assetAssignment->assigned_by = $validated['assigned_by'];
        $assetAssignment->assignment_date = $request->assignment_date;
        $assetAssignment->status = $request->status;
        $assetAssignment->is_due = $request->is_due;
        $assetAssignment->due_date = $request->due_date;
        $assetAssignment->save();

        // Fire event
        AssetAssigned::dispatch($assetAssignment->asset_id, $assetAssignment->assigned_by);

        // return response()->json([
        //     'data' => $validated
        // ]);

        return response()->json([
            "success" => true,
            "message" => "AssetAssignment created successfully",
            "data" => $assetAssignment
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
        $assetAssignment = AssetAssignment::findOrFail($id);
        
        if (is_null($assetAssignment)) {
            return $this->sendError('AssetAssignment not found.');
        }
        
        return response()->json([
            "success" => true,
            "message" => "AssetAssignment retrieved successfully.",
            "data" => $assetAssignment
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
            "message" => "AssetAssignment editing route working... don't you be surprised.",
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAssetAssignmentRequest $request, AssetAssignment $assetAssignment)
    {
        $validated = $request->validated();

        $assetAssignment->asset_id = $validated['asset_id'];
        $assetAssignment->assigned_user_id = $validated['assigned_user_id'];
        $assetAssignment->assigned_by = $validated['assigned_by'];
        $assetAssignment->assignment_date = $request->assignment_date;
        $assetAssignment->status = $request->status;
        $assetAssignment->is_due = $request->is_due;
        $assetAssignment->due_date = $request->due_date;
        $assetAssignment->save();

        return response()->json([
            "success" => true,
            "message" => "AssetAssignment updated successfully.",
            "data" => $assetAssignment
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssetAssignment $assetAssignment)
    {
        $assetAssignment->delete();
        return response()->json([
            "success" => true,
            "message" => "AssetAssignment deleted successfully.",
            "data" => $assetAssignment
        ]);
    }
}
