<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefSejarahTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_sejarah', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul');
            $table->text('konten')->nullable();
            $table->text('keterangan')->nullable();

            $table->timestamp('created_at')->nullable();
            $table->integer('created_by')->unsigned()->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
        });
        Schema::create('log_sejarah', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_sejarah')->unsigned();
            $table->string('judul');
            $table->text('konten')->nullable();
            $table->text('keterangan')->nullable();

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
        Schema::dropIfExists('log_sejarah');
        Schema::dropIfExists('ref_sejarah');
    }
}
