<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', fn () => response()->json('ready!'));
Route::post('/signin', [AuthController::class, 'signIn']);
Route::post('/signup', [AuthController::class, 'signUp']);
Route::get('/signout', [AuthController::class, 'signOut']);
Route::get('/authenticate', [AuthController::class, 'authenticate']);

Route::middleware('auth:sanctum')->group(function () {
  Route::get('/user', [AuthController::class, 'whoami']);
  Route::get('/user/verify', [AuthController::class, 'verify'])
    ->middleware('throttle:6,1')
    ->name('verification.send');
  Route::get('/user/verify/{id}/{hash}', [AuthController::class, 'verifyVerification'])
    ->middleware('signed')
    ->name('verification.verify');
});

Route::apiResources([
  'activities' => \App\Http\Controllers\ActivityController::class,
  'facilities' => \App\Http\Controllers\FacilityController::class,
  // 'files' => \App\Http\Controllers\FileController::class,
  'reservable-prices' => \App\Http\Controllers\ReservablePriceController::class,
  'reservations' => \App\Http\Controllers\ReservationController::class,
  'reservation-payments' => \App\Http\Controllers\ReservationPaymentController::class,
  'rooms' => \App\Http\Controllers\RoomController::class,
  'users' => \App\Http\Controllers\UserController::class,
]);
