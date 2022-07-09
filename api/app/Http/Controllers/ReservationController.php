<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ReservationController extends APIController
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
      ? Reservation::with($relations)
      : Reservation::needActions()->with($relations);

    if (request()->query->getBoolean('all')) {
      return $this->send($builder->get($columns)->makeHidden($hidden));
    };

    $pagination = $builder->paginate($this->PAGINATION_PERPAGE_DEFAULT, $columns)
      ->appends(request()->query());
    $pagination->makeHidden($hidden);

    return $pagination;
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return \Illuminate\Http\Response
   */
  public function store(StoreReservationRequest $request)
  {
    abort(404);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Reservation  $reservation
   * @return \Illuminate\Http\Response
   */
  public function show(Reservation $reservation)
  {
    /** @var Builder */
    $builder = $reservation->load(['reservable:id,name', 'user:id,name', 'approvalAssignee:id,name']);

    return $this->send($builder
      ->makeHidden(['reservable_id', 'reservable_type', 'user_id', 'approval_assigned_by_id']));
  }

  /**
   * Update the specified resource in storage.
   *
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
