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
    Schema::create('facilities', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->text('description');
      $table->unsignedBigInteger('added_by_id')->index();
      $table->foreign('added_by_id')->references('id')->on('users');
      $table->timestamps();
    });

    Schema::create('facilities_images', function (Blueprint $table) {
      $table->unsignedBigInteger('facility_id')->index();
      $table->foreign('facility_id')->references('id')->on('facilities');
      $table->uuid('image_id')->index();
      $table->foreign('image_id')->references('id')->on('files');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('facilities_images');
    Schema::dropIfExists('facilities');
  }
};
