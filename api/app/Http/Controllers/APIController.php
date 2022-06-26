<?php

namespace App\Http\Controllers;

class APIController extends Controller
{
  private $message = null;

  public function send($data, string $message = null)
  {
    return response()->json([
      'success' => true,
      'data' => $data,
      'message' => is_null($message) ? $this->message : $message,
    ], 200);
  }

  public function sendError(string $message, $code = 500, $data = null)
  {
    return response()->json([
      'success' => false,
      'message' => $message,
      'data' => $data,
    ], $code);
  }

  public function message(string $message)
  {
    $this->message = $message;
    return $this;
  }
}
