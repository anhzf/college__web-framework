<?php

namespace App\Models\Enums;

enum ReservationStatus: string
{
  case Pending = 'pending';
  case Approved = 'approved';
  case Rejected = 'rejected';
  case Cancelled = 'cancelled';
}
