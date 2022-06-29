<?php

namespace App\Models\Enums;

enum UserRole: string
{
  case Member = 'member';
  case Admin = 'admin';
}
