<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Requests\StoreRoomReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Room;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class RoomReservationController extends APIController
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $columns = ['id', 'reservable_id', 'reservable_type', 'start', 'long', 'description_short', 'status', 'user_id'];
    $hidden = ['reservable_id', 'reservable_type', 'user_id', 'approval_assigned_by_id', 'approval_assigned_at'];
    $relations = ['reservable:id,name', 'user:id,name'];

    /** @var Builder */
    $builder = request()->query->getBoolean('ignoreStatus')
      ? Reservation::whereHasMorph('reservable', Room::class)
      : Reservation::needActions()->whereHasMorph('reservable', Room::class);

    $builder->with($relations);

    if (request()->query->getBoolean('all')) {
      return $this->send($builder->get($columns)->makeHidden($hidden));
    }

    return $builder->paginate($this->PAGINATION_PERPAGE_DEFAULT, $columns)
      ->makeHidden($hidden);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return \Illuminate\Http\Response
   */
  public function store(StoreRoomReservationRequest $request)
  {
    $payload = $request->safe();

    if ($room = Room::find($payload->room_id, ['id'])) {
      /** @var Reservation */
      $reservation = Reservation::make([
        ...$payload->except(['room_id', 'start']),
        'start' => Carbon::parse($payload->start),
      ]);
      $reservation->reservable()->associate($room);
      $reservation->user()->associate($request->user());
      $reservation->save();
      return $this->send($reservation->getKey());
    }

    abort(422, 'Room not found!');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Reservation  $reservation
   * @return \Illuminate\Http\Response
   */
  public function show(Reservation $reservation)
  {
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateReservationRequest  $request
   * @param  \App\Models\Reservation  $reservation
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateReservationRequest $request, Reservation $reservation)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Reservation  $reservation
   * @return \Illuminate\Http\Response
   */
  public function destroy(Reservation $reservation)
  {
    //
  }
}
