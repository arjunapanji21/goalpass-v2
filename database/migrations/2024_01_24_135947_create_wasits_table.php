<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWasitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wasits', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tgl_lahir');
            $table->string('nik');
            $table->string('kd_kota');
            $table->string('kd_gender');
            $table->string('kd_urutkota');
            $table->string('kd_kartu');
            $table->string('tgl_rilis')->nullable();
            $table->string('expired')->nullable();
            $table->string('jml_cetak')->default(0);
            $table->string('kota_kab')->nullable();
            $table->string('foto')->default('/images/no-profile.webp');
            $table->string('KK')->nullable();
            $table->string('KTP')->nullable();
            $table->string('sertifikat')->nullable();
            $table->enum('license', ['unlicensed', 'C3', 'C2', 'C1', 'MC']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wasits');
    }
}
