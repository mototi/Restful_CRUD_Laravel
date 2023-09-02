<?php

namespace App\Http\Controllers;


use App\Http\Requests\Bulding\CreateBuildingRequest;
use App\Http\Requests\Bulding\UpdateBuildingRequest;
use App\Http\Resources\BuildingResource;
use Illuminate\Http\Request;
use App\Models\Building;

class BuildingController extends Controller
{
    //get all buildings

    public function index()
    {
        $buildings = Building::all();
        return BuildingResource::collection($buildings);
    }

    //create new building

    public function create (CreateBuildingRequest $request)
    {
        $building = $request->createBuilding();
        return new BuildingResource($building);
    }

    //update building
    public function update (UpdateBuildingRequest $request)
    {
        $building = $request->updateBuilding();
        return new BuildingResource($building);
    }

    //delete building
    public function delete($id)
    {
        $building = Building::findOrfail($id);
        $building->delete();

        return response()->json([
            'message' => 'Building deleted successfully',
        ]);
    }

}
