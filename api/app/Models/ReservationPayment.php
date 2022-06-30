<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $reservation_id
 * @property string $attachment_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * Relationships
 * @property Reservation $reservation
 * @property File $attachment
 */
class ReservationPayment extends Model
{
  use HasFactory;

  public function reservation()
  {
    return $this->belongsTo(Reservation::class);
  }

  public function attachment()
  {
    return $this->hasOne(File::class, 'id', 'attachment_id');
  }
}
