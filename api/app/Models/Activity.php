<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $action_name
 * @property int|null $user_id
 * @property string|null $display_text
 * @property string|null $resource_name
 * @property array|null $payload
 * @property \Illuminate\Support\Carbon|null $created_at
 * Relationships
 * @property User $user
 */
class Activity extends Model
{
  use HasFactory;

  protected $guarded = [];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
