<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

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
 * @property Facility[] $facilities
 * @property ReservablePrice[] $prices
 */
class Room extends Model implements HasMedia
{
  use HasFactory, InteractsWithMedia;

  protected $guarded = [];

  /**
   * The accessors to append to the model's array form.
   *
   * @var array
   */
  protected $appends = ['photos'];

  protected function photos(): Attribute
  {
    return Attribute::get(fn () => $this->getMedia()->map(fn ($media) => $media->getFullUrl()));
  }

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

  public function facilities()
  {
    return $this->hasMany(Facility::class);
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
