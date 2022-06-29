<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
  use HasFactory;

  public function images()
  {
    return $this->belongsToMany(File::class, 'facilities_images', 'facility', 'image');
  }
}
