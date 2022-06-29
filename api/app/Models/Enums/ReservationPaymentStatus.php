<?php

namespace App\Models\Enums;

enum ReservationPaymentStatus: string
{
  case Unpaid = 'unpaid';
  case Pending = 'pending';
  case Paid = 'paid';
  case Rejected = 'rejected';
}
