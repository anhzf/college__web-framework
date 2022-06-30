<?php

use App\Models\Enums\ReservationStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('reservations', function (Blueprint $table) {
      $table->id();
      $table->morphs('reservable');
      $table->dateTime('start');
      $table->unsignedInteger('long')->nullable();
      $table->unsignedInteger('qty')->nullable();
      $table->string('description_short');
      $table->text('description')->nullable();
      $table->unsignedBigInteger('user_id')->index();
      $table->foreign('user_id')->references('id')->on('users');
      $table->string('status')->default(ReservationStatus::Pending->value);
      $table->unsignedBigInteger('approval_assigned_by_id')->index()->nullable();
      $table->foreign('approval_assigned_by_id')->references('id')->on('users');
      $table->dateTime('approval_assigned_at')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('reservations');
  }
};
