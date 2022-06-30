<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @property int $id
 * @property int $reservation_id
 * @property int $billed_amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * Relationships
 * @property Reservation $reservation
 * @property File $attachment
 */
class ReservationPayment extends Model implements HasMedia
{
  use HasFactory, InteractsWithMedia;

  protected $guarded = [];

  public function reservation()
  {
    return $this->belongsTo(Reservation::class);
  }

  public function attachment()
  {
    return $this->hasOne(File::class, 'id', 'attachment_id');
  }
}
