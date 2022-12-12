<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePilihanAlternatifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pilihan_alternatifs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_alternatif');
            $table->string('kode_alternatif', 16)->nullable();
            $table->string('nama_alternatif')->nullable();
            $table->unsignedBigInteger('id_user');
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
        Schema::dropIfExists('pilihan_alternatifs');
    }
}
