<?php

namespace App\Libraries;

function truthy($value)
{
  return isset($value) && boolval($value);
}
