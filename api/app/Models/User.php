<?php

namespace App\Models;

use App\Models\Enums\UserRole;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property UserRole $role
 * @property string|null $remember_token
 * @property string|null $internal_id
 * @property bool $is_internal
 * @property int|null $is_internal_verified_by_id
 * @property \Illuminate\Support\Carbon|null $is_internal_verified_at
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property int|null $verified_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * Computed
 * @property-read bool $isAdmin
 * Relationships
 * @property Activity[] $activities
 * @property Reservation[] $reservations
 */
class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
  use HasApiTokens, HasFactory, Notifiable, InteractsWithMedia;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'name',
    'email',
    'password',
    'internal_id'
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  public function role(): Attribute
  {
    return Attribute::get(fn ($v) => UserRole::from($v));
  }

  public function getIsAdminAttribute()
  {
    return $this->role === UserRole::Admin;
  }

  public function activities()
  {
    return $this->hasMany(Activity::class);
  }

  public function reservations()
  {
    return $this->hasMany(Reservation::class);
  }

  public function addedRooms()
  {
    return $this->hasMany(Room::class, 'added_by_id');
  }

  public function addedFacilities()
  {
    return $this->hasMany(Facility::class, 'added_by_id');
  }

  public function registerMediaConversions(Media $media = null): void
  {
    $this->addMediaConversion('thumb')
      ->withResponsiveImages();
  }
}
