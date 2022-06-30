<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $reservable_id
 * @property string $reservable_type
 * @property \Illuminate\Support\Carbon $start
 * @property int|null $long
 * @property string $description_short
 * @property string|null $description
 * @property int $user_id
 * @property \App\Models\Enums\ReservationStatus $status
 * @property int|null $billed_amount
 * @property int $approval_assigned_by_id
 * @property \Illuminate\Support\Carbon $approval_assigned_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * Relationships
 * @property Room|Facility $reservable
 * @property User $user
 * @property User $approvalAssignee
 */
class Reservation extends Model
{
  use HasFactory;

  /**
   * Get the parent reservable model (room or facility).
   */
  public function reservable()
  {
    return $this->morphTo();
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function approvalAssignee()
  {
    return $this->belongsTo(User::class, 'approval_assigned_by_id');
  }
}
