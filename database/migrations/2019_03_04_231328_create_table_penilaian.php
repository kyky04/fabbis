<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePenilaian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('nilai', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_pemain')->unsigned();
          $table->integer('id_detail')->unsigned();;
          $table->integer('nilai');

          $table->foreign('id_pemain')->references('id')->on('pemain')
              ->onUpdate('cascade')->onDelete('cascade');
          $table->foreign('id_detail')->references('id')->on('kriteria_detail')
              ->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('nilai');
    }
}
