<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePemain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('pemain', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nama');
          $table->integer('nim');
          $table->integer('tinggi');
          $table->integer('berat');
          $table->string('posisi');
          $table->text('foto')->nullable();
          $table->integer('status');

          $table->timestamp('created_at')->nullable();
          $table->integer('created_by')->unsigned()->nullable();
          $table->timestamp('updated_at')->nullable();
          $table->integer('updated_by')->unsigned()->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemain');
    }
}
