<?php

namespace App\Http\Controllers\api;

use App\Models\Rooms;
use App\Utils\ImageManager;
use Illuminate\Http\Request;
use App\Http\Requests\RoomRequest;
use App\Http\Controllers\Controller;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Rooms::with(['sale', 'images', 'unit'])->get();
        return responseApi(200, 'OK', $rooms);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomRequest $request)
    {
        $request->validated();

        $room = Rooms::create($request->except('images'));
        $room->images();
        ImageManager::UploadImages($request, null,$room);
        if (!$room) {
            return responseApi(404, 'Not Found');
        }
        return responseApi(201, 'Room created successfully', $room);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rooms = Rooms::whereId($id)->first();
        if(!$rooms){
            return responseApi(404, 'Not Found room');
        }
        $user = $rooms->unit;
        $suer = $rooms->images;
        $suer = $rooms->sale;
        return responseApi(200, 'Response rooms found', $rooms);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoomRequest $request, string $id)
    {
        $rooms = Rooms::find($id);
        if (!$rooms) {
            return responseApi(404, 'Not Found');
        }
        if ($request->hasFile('images'))
            {
                ImageManager::deleteImages($rooms);
                ImageManager::UploadImages($request, null, $rooms);
            }
        $rooms->update($request->all());
        return responseApi(200, 'Room updated successfully', $rooms);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rooms = Rooms::find($id);
        if (!$rooms) {
            return responseApi(404, 'Not Found');
        }
        $rooms->delete();
        return responseApi(204, 'room deleted successfully');
    }
}
