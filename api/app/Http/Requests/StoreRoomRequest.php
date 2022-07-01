<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoomRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return $this->user()?->isAdmin;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, mixed>
   */
  public function rules()
  {
    return [
      'name' => 'required|string',
      'description' => 'string',
      'images' => 'required|array',
      'images.*' => 'required|mimes:png,jpg,webp|max:4096',
      'price_start' => 'numeric',
      'price_per_hour' => 'numeric',
    ];
  }
}
