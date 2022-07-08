<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use Illuminate\Database\Eloquent\Builder;
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
    $columns = ['id', 'name'];
    $append = ['photos'];
    $hidden = ['media', 'added_by_id', 'created_at', 'updated_at'];

    if (request()->query->getBoolean('all')) {
      return $this->send(Room::all($columns)->append($append)->makeHidden($hidden));
    }

    $pagination = Room::paginate($this->PAGINATION_PERPAGE_DEFAULT, $columns)
      ->appends(request()->query());
    $pagination->makeHidden($hidden)->append($append);

    return $pagination;
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
    /** @var Builder */
    $builder = $room->load(['addedBy', 'prices:id,reservable_type,reservable_id,label,price_start,price_per_hour']);
    $builder->prices->makeHidden(['reservable_type', 'reservable_id']);

    return $this->send($builder
      ->append(['photos'])
      ->makeHidden(['media', 'added_by_id']));
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
