<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Enums\APIMessage;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends APIController
{
  public function whoami()
  {
    $user = Auth::user();
    return $this->send($user);
  }

  public function authenticate()
  {
    if (!Auth::check()) {
      throw new AuthenticationException();
    }
  }

  public function signIn(Request $request)
  {
    $credential = $request->validate([
      'email' => 'required|email',
      'password' => 'required',
    ]);

    if (Auth::guard('web')->attempt($credential)) {
      /** @var \App\Models\User */
      $user = Auth::user();
      $token = $user->createToken('authToken')->plainTextToken;
      return $this->send([
        'user' => $user,
        'token' => $token,
      ]);
    }

    return $this->sendError(APIMessage::INVALID_CREDENTIALS, 401);
  }

  public function signUp(Request $request)
  {
    $validated = $request->validate([
      'name' => 'required',
      'email' => 'required|email|unique:users',
      'password' => 'required|confirmed',
    ]);

    $user = User::create(array_merge($validated, [
      'password' => Hash::make($validated['password']),
    ]));
    event(new Registered($user));
    $token = $user->createToken('authToken')->plainTextToken;
    return $this->send([
      'username' => $user->name,
      'token' => $token,
    ]);
  }

  public function signOut()
  {
    Auth::user()->currentAccessToken()->delete();
    return $this->send(null, 'signed out');
  }

  public function verify(Request $request)
  {
    $request->user()->sendEmailVerificationNotification();
    return $this->send(null, APIMessage::VERIFICATION_SENT);
  }

  public function verifyVerification(EmailVerificationRequest $request)
  {
    $request->fulfill();
    return $this->send(null, APIMessage::SUCCESS_VERIFICATION);
  }
}
