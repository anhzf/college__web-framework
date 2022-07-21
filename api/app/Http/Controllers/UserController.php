<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Database\Eloquent\Builder;

class UserController extends APIController
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $columns = ['id', 'name'];
    return $this->send(User::all($columns));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StoreUserRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreUserRequest $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function show(User $user)
  {
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function edit(User $user)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateUserRequest  $request
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateUserRequest $request, User $user)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function destroy(User $user)
  {
    //
  }

  public function myReservations()
  {
    $columns = ['id', 'reservable_id', 'reservable_type', 'start', 'long', 'description_short', 'status', 'user_id'];
    $hidden = ['reservable_id', 'reservable_type', 'user', 'user_id', 'approval_assigned_by_id', 'approval_assigned_at'];
    $relations = ['reservable:id,name', 'approvalAssignee:id,name'];
    $append = ['billed_amount'];

    /** @var User */
    $user = auth()->user();
    /** @var Builder */
    $builder = $user->reservations()->with($relations);

    return $this->send($builder->get($columns)->append($append)->makeHidden($hidden));
  }
}
