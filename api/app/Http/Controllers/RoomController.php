<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class RoomController extends APIController
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return $this->send(Room::all());
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StoreRoomRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreRoomRequest $request)
  {
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Room  $room
   * @return \Illuminate\Http\Response
   */
  public function show(Room $room)
  {
    return $room->load(['addedBy', 'prices', 'media']);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateRoomRequest  $request
   * @param  \App\Models\Room  $room
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateRoomRequest $request, Room $room)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Room  $room
   * @return \Illuminate\Http\Response
   */
  public function destroy(Room $room)
  {
    //
  }
}
