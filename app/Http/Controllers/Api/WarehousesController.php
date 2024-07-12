<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\WarehousesCollection;
use App\Http\Resources\WarehousesResource;
use App\Models\Warehouse;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class WarehousesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $warehouses = Warehouse::all();
        // return new WarehousesCollection($warehouses);

        $warehouses = Warehouse::paginate(5);
        return  WarehousesResource::collection($warehouses);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "name" => "required|unique:warehouses,name",
            "status_id" => "required",
            "user_id" => "required"
        ]);

       $warehouse = new Warehouse();
       $warehouse->name = $request["name"];
       $warehouse->slug = Str::slug($request["name"]);
       $warehouse->status_id = $request["status_id"];
       $warehouse->user_id = $request["user_id"];

       $warehouse->save();

       return new WarehousesResource($warehouse);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            "name" => "required|unique:warehouses,name,".$id,
            "status_id" => "required",
            "user_id" => "required"
        ]);

       $warehouse = Warehouse::findOrFail($id);
       $warehouse->name = $request["name"];
       $warehouse->slug = Str::slug($request["name"]);
       $warehouse->status_id = $request["status_id"];
       $warehouse->user_id = $request["user_id"];

       $warehouse->save();

       return new WarehousesResource($warehouse);
        
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $warehouse = Warehouse::findOrFail($id);
        $warehouse->delete();
        return new WarehousesResource($warehouse);
    }

    public function typestatus(Request $request){
        $warehouse = Warehouse::findOrFail($request["id"]);
        $warehouse->status_id = $request["status_id"];
        $warehouse->save();

        return new WarehousesResource($warehouse);
    }
}