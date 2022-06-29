<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
    Schema::create('files', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('storage');
      $table->string('filename_disk_suffix')->nullable();
      $table->string('filename_download')->nullable();
      $table->unsignedBigInteger('uploaded_by_id')->index();
      $table->foreign('uploaded_by_id')->references('id')->on('users');
      $table->string('title')->nullable();
      $table->string('type')->nullable();
      $table->string('charset')->nullable();
      $table->bigInteger('filesize')->nullable();
      $table->unsignedInteger('width')->nullable();
      $table->unsignedInteger('height')->nullable();
      $table->unsignedInteger('duration')->nullable();
      $table->text('description')->nullable();
      $table->json('location')->nullable();
      $table->json('tags')->nullable();
      $table->json('metadata')->nullable();
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
    Schema::dropIfExists('files');
  }
};
