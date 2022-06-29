<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property string $description
 * @property int $added_by
 * @property User $addedBy
 */
class Room extends Model
{
  use HasFactory;

  public function addedBy()
  {
    return $this->belongsTo(User::class, 'added_by');
  }

  public function images()
  {
    return $this->belongsToMany(File::class, 'rooms_images', 'room', 'image');
  }

  // public function images()
  // {
  //   return $this->hasManyThrough(File::class, RoomImage::class);
  // }
}
