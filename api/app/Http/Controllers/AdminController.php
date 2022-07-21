<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends APIController
{

  /**
   * Instantiate a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware(fn (Request $request, callable $next) => $request->user()->isAdmin ?
      $next($request)
      : abort(403));
  }

  public function listUsers()
  {
    $columns = ['id', 'name', 'email_verified_at'];
    $hidden = ['email_verified_at'];

    return $this->send(User::all($columns)->makeHidden($hidden)->append('is_verified'));
  }

  public function getUser(User $user)
  {
    $relations = ['verificator:id,name', 'internalMemberVerificator:id,name'];

    $user->load($relations);

    return $this->send($user);
  }

  public function markUserVerified(User $user)
  {
    $user->markEmailAsVerified();
    $user->verified_by_id = auth()->id();
    $user->save();
    return $this->send($user->getKey());
  }

  public function markInternalUser(User $user)
  {
    $user->is_internal = true;
    $user->is_internal_verified_by_id = auth()->id();
    $user->save();
    return $this->send($user->getKey());
  }
}
