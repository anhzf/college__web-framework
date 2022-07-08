<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return !is_null($this->user()?->email_verified_at);
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, mixed>
   */
  public function rules()
  {
    return [
      'start' => 'required|date',
      'long' => 'numeric',
      'description_short' => 'required|string',
      'description' => 'nullable|string',
    ];
  }
}
