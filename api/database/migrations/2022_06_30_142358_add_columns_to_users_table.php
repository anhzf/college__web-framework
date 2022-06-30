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
    Schema::table('users', function (Blueprint $table) {
      $table->boolean('is_internal')->default(false);
      $table->unsignedBigInteger('is_internal_verified_by_id')->nullable();
      $table->foreign('is_internal_verified_by_id')->references('id')->on('users');
      $table->timestamp('is_internal_verified_at')->nullable();
      $table->unsignedBigInteger('verified_by_id')->nullable();
      $table->foreign('verified_by_id')->references('id')->on('users');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('users', function (Blueprint $table) {
      $table->dropForeign(['verified_by_id']);
      $table->dropForeign(['is_internal_verified_by_id']);
      $table->dropColumn(['is_internal', 'is_internal_verified_at']);
    });
  }
};
