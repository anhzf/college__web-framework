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
    Schema::create('reservable_prices', function (Blueprint $table) {
      $table->id();
      $table->morphs('reservable');
      $table->string('label');
      $table->unsignedInteger('price_start');
      $table->unsignedInteger('price_per_time_unit')->nullable();
      $table->string('price_time_unit')->nullable();
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
    Schema::dropIfExists('reservable_prices');
  }
};
