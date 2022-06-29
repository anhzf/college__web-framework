<?php

namespace App\Models;

use App\Concerns\Eloquent\UuidAsPK;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
  use UuidAsPK, HasFactory;

  public function store()
  {
  }
}
