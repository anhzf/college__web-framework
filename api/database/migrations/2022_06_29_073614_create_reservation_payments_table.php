<?php

use App\Models\Enums\ReservationPaymentStatus;
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
    Schema::create('reservation_payments', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('reservation_id')->index();
      $table->foreign('reservation_id')->references('id')->on('reservations');
      $table->string('status')->default(ReservationPaymentStatus::Unpaid->value);
      $table->unsignedInteger('billed_amount');
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
    Schema::dropIfExists('reservation_payments');
  }
};
