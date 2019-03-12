<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMasterKriteria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('kriteria', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nama');

          $table->timestamp('created_at')->nullable();
          $table->integer('created_by')->unsigned()->nullable();
          $table->timestamp('updated_at')->nullable();
          $table->integer('updated_by')->unsigned()->nullable();
      });

      Schema::create('kriteria_detail', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_kriteria')->unsigned();
          $table->string('nama');

          $table->foreign('id_kriteria')->references('id')->on('kriteria')
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
        Schema::dropIfExists('kriteria');
        Schema::dropIfExists('kriteria_detail');
    }
}
