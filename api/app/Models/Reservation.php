<?php

namespace App\Models;

use App\Models\Enums\ReservationStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
 * @property int $approval_assigned_by_id
 * @property \Illuminate\Support\Carbon $approval_assigned_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * Relationships
 * @property Room|Facility $reservable
 * @property User $user
 * @property User $approvalAssignee
 * @property ReservationPayment $billings
 */
class Reservation extends Model
{
  use HasFactory;

  protected $guarded = [];

  /**
   * The accessors to append to the model's array form.
   *
   * @var array
   */
  protected $appends = ['billed_amount'];

  public function billedAmount(): Attribute
  {
    return Attribute::get(fn () => $this->countBill());
  }

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

  public function billings()
  {
    return $this->hasMany(ReservationPayment::class);
  }

  public function countBill()
  {
    if ($this->user->is_internal || ($this->user->internal_id && $this->user->is_internal_verified_at)) {
      return null;
    }

    /** @var ReservablePrice */
    $price = $this->reservable->price();
    $start = $price->price_start;

    if (is_int($price->price_per_hour)) {
      $multiplier = is_int($this->long) ? round($this->long / 60) : 0;
      return $start + ($price->price_per_hour * $multiplier);
    }

    return $start;
  }

  public function scopeNeedActions(Builder $query)
  {
    return $query->where('status', ReservationStatus::Pending);
  }
}
