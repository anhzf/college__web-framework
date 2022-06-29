<?php

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
      $table->string('reservable_id');
      $table->string('reservable_type');
      $table->dateTime('start');
      $table->unsignedInteger('long')->nullable();
      $table->unsignedInteger('qty')->nullable();
      $table->string('description_short');
      $table->text('description')->nullable();
      $table->unsignedBigInteger('user_id')->index();
      $table->foreign('user_id')->references('id')->on('users');
      $table->string('status')->default('pending');
      $table->unsignedInteger('billed_amount')->nullable();
      $table->unsignedBigInteger('approval_assigned_by_id')->index();
      $table->foreign('approval_assigned_by_id')->references('id')->on('users');
      $table->dateTime('approval_assigned_at');
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
