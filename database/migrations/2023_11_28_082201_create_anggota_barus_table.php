<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaBarusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota_barus', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tgl_lahir');
            $table->string('nik');
            $table->string('klub');
            $table->string('umur');
            $table->string('kd_kota');
            $table->string('kd_gender');
            $table->string('kota_kab')->nullable();
            $table->string('foto')->default('/images/no-profile.webp');
            $table->string('akta_lahir')->nullable();
            $table->string('KK')->nullable();
            $table->string('KTP')->nullable();
            $table->string('pasfoto')->nullable();
            $table->string('KTM')->nullable();
            $table->string('ijazah')->nullable();
            $table->enum('status', ['Pending', 'Accepted', 'Rejected']);
            $table->string('submit_by')->nullable();
            $table->text('submit_msg')->nullable();
            $table->string('reject_by')->nullable();
            $table->text('reject_msg')->nullable();
            $table->string('accept_by')->nullable();
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
        Schema::dropIfExists('anggota_barus');
    }
}
