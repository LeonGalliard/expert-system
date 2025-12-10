<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DiagnosaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosa', function (Blueprint $table) {
            $table->id('idDiagnosa');
            $table->unsignedBigInteger('idUser');
            $table->string('kdKerusakan', 4);
            $table->timestamps();

            $table->foreign('idUser')
                ->references('idUser')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('kdKerusakan')
                ->references('kdKerusakan')
                ->on('kerusakan')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diagnosa');
    }
}
