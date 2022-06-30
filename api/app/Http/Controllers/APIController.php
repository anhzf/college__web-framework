<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Enums\APIMessage;

class APIController extends Controller
{
  private $message = null;

  public function send($data = null, APIMessage|string $message = null, int $code = 200)
  {
    return response()->json([
      'data' => $data,
      'message' => is_null($message) ? $this->message : $message,
    ], $code);
  }

  public function sendError(APIMessage|string $message, $code = 500, $data = null)
  {
    return response()->json([
      'message' => $message,
      'data' => $data,
    ], $code);
  }

  public function message(APIMessage|string $message)
  {
    $this->message = $message;
    return $this;
  }
}
