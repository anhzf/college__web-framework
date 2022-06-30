<?php

namespace App\Models;

use App\Concerns\Eloquent\UuidAsPK;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * @deprecated
 * @property string $id
 * @property string $storage
 * @property string|null $filename_disk_suffix
 * @property string|null $filename_download
 * @property int|null $uploaded_by_id
 * @property string|null $title
 * @property string|null $type
 * @property string|null $charset
 * @property int|null $filesize
 * @property int|null $width
 * @property int|null $height
 * @property int|null $duration
 * @property string|null $description
 * @property array|null $location
 * @property array|null $tags
 * @property array|null $metadata
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * Relationships
 * @property User $user
 */
class File extends Model
{
  use UuidAsPK, HasFactory;

  protected $guarded = [];

  /**
   * @param \Psr\Http\Message\StreamInterface|\Illuminate\Http\File|\Illuminate\Http\UploadedFile|string|resource $file
   */
  public function store($contents)
  {
    $this->initializeUuid();
    // Storage::put($this->path, $contents);
  }

  public function user()
  {
    return $this->belongsTo(User::class, 'uploaded_by_id');
  }
}
