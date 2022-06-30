<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $reservable_id
 * @property string $reservable_type
 * @property string $label
 * @property int $price_start
 * @property int|null $price_per_time_unit
 * @property int|null $price_time_unit
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * Relationships
 * @property Room|Facility $reservable
 */
class ReservablePrice extends Model
{
  use HasFactory;

  /**
   * Get the parent reservable model (room or facility).
   */
  public function reservable()
  {
    return $this->morphTo();
  }
}
