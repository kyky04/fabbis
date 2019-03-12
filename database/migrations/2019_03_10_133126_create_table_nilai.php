<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNilai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('nilai_peserta', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_pemain')->unsigned();
          $table->integer('dribble1');
          $table->integer('dribble2');
          $table->integer('dribble3');
          $table->integer('dribble4');
          $table->integer('dribble5');
          $table->integer('dribble6');
          $table->integer('dribble7');
          $table->integer('dribble8');

          $table->integer('shooting1');
          $table->integer('shooting2');
          $table->integer('shooting3');
          $table->integer('shooting4');

          $table->integer('pass1');
          $table->integer('pass2');
          $table->integer('pass3');
          $table->integer('pass4');

          $table->integer('defence');
          $table->integer('serangan');
          $table->integer('speed');

          $table->foreign('id_pemain')->references('id')->on('pemain')
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
        Schema::dropIfExists('nilai_peserta');
    }
}
