<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempBobotAlternatifKriteritasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_bobot_alternatif_kriteritas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('kriteria_id');
            $table->unsignedBigInteger('alternatif_id');
            $table->unsignedBigInteger('id_user');
            $table->timestamps();
            $table->foreign('kriteria_id')
                ->references('id')
                ->on('kriteria')
                ->onUpdate('cascade')
                ->onDelete('cascade')
            ;
            $table->foreign('alternatif_id')
                ->references('id')
                ->on('alternatif')
                ->onUpdate('cascade')
                ->onDelete('cascade')
            ;
            $table->integer('nilai');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temp_bobot_alternatif_kriteritas');
    }
}
