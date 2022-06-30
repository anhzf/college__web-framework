<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $added_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * Relationships
 * @property User $addedBy
 * @property File[] $images
 * @property Reservation[] $reservations
 * @property ReservablePrice[] $prices
 */
class Facility extends Model
{
  use HasFactory;

  public function addedBy()
  {
    return $this->belongsTo(User::class, 'added_by_id');
  }

  public function images()
  {
    return $this->belongsToMany(File::class);
  }

  public function reservations()
  {
    return $this->morphMany(Reservation::class, 'reservable');
  }

  public function prices()
  {
    return $this->morphMany(ReservablePrice::class, 'reservable');
  }

  public function price()
  {
    return $this->prices()->where('label', 'default')->first();
  }
}
