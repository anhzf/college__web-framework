<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Enums\APIMessage;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
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

  public function signUp(StoreUserRequest $request)
  {
    $payload = $request->safe();

    $user = User::create([
      ...$payload->except(['internal_idcard_file']),
      'password' => Hash::make($payload->password),
    ]);
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
    if (!hash_equals((string) $request->route('id'), (string) $request->user()->getKey())) {
      throw new AuthorizationException;
    }

    if (!hash_equals((string) $request->get('hash'), sha1($request->user()->getEmailForVerification()))) {
      throw new AuthorizationException();
    }

    if ($request->user()->hasVerifiedEmail()) {
      return $this->send(null, APIMessage::ALREADY_VERIFIED, 204);
    }

    if ($request->user()->markEmailAsVerified()) {
      event(new Verified($request->user()));
    }

    if ($response = $this->verified($request)) {
      return $response;
    }

    return $this->send(null, APIMessage::SUCCESS_VERIFICATION);
  }
}
