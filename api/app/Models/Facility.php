<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $room_id
 * @property int $added_by_id
 * @property array $specs
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * Relationships
 * @property User $addedBy
 * @property File[] $images
 * @property Room $room
 * @property Reservation[] $reservations
 * @property ReservablePrice[] $prices
 */
class Facility extends Model implements HasMedia
{
  use HasFactory, InteractsWithMedia;

  protected $guarded = [];

  public function addedBy()
  {
    return $this->belongsTo(User::class, 'added_by_id');
  }

  public function images()
  {
    return $this->belongsToMany(File::class);
  }

  public function room()
  {
    return $this->belongsTo(Room::class);
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
