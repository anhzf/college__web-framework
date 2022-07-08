<?php

namespace App\Http\Requests;

class StoreRoomReservationRequest extends StoreReservationRequest
{
  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, mixed>
   */
  public function rules()
  {
    return [
      ...parent::rules(),
      'room_id' => 'required|exists:rooms,id',
    ];
  }
}
