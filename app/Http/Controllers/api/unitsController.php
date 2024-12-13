<?php

namespace App\Http\Controllers\api;

use App\Models\Units;
use App\Utils\ImageManager;
use Illuminate\Http\Request;
use App\Http\Requests\UnitsRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\UnitsCollection;

class unitsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = Units::with(['rooms', 'sales', 'images'])->where('type_unit', 'LIKE', request()->type_unit)->get();
        return responseApi(200, 'OK', UnitsCollection::make($units));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UnitsRequest $request)
    {
        $request->validated();

        $unit = Units::create($request->except('images'));
        $unit->images();
        ImageManager::UploadImages($request, null,$unit);
        if (!$unit) {
            return responseApi(404, 'Not Found');
        }
        return responseApi(201, 'Unit created successfully', $unit);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $units = Units::whereId($id)->first();
        if (!$units) {
            return responseApi(404, 'Not Found unit');
        }
        $user = $units->rooms->map(function($room) {
            return $room->media; // Access media property of each room
        });
        $sale = $units->images;
        $sale = $units->sales;
        return responseApi(200, 'Response rooms units found', $units);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UnitsRequest $request, string $id)
    {
        $units = Units::find($id);
        if (!$units) {
            return responseApi(404, 'Not Found');
        }
        if ($request->hasFile('images'))
            {
                ImageManager::deleteImages($units);
                ImageManager::UploadImages($request, null, $units);
            }
        $units->update($request->all());
        return responseApi(200, 'Unit updated successfully', $units);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $unit = Units::find($id);
        if (!$unit) {
            return responseApi(404, 'Not Found');
        }
        $unit->delete();
        return responseApi(204, 'Unit deleted successfully');
    }
}
