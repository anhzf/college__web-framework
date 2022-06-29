<?php

namespace App\Concerns\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait UuidAsPK
{
  public function getIncrementing()
  {
    return false;
  }

  public function getKeyType()
  {
    return 'string';
  }

  public static function bootUuidAsPK()
  {
    static::creating(function (Model $model) {
      error_log('creating');
      if (empty($model->getKey())) {
        $model->setAttribute($model->getKeyName(), Str::orderedUuid());
      }
    });
  }
}
