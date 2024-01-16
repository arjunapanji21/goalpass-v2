<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMutasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutasis', function (Blueprint $table) {
            $table->id();
            $table->string('anggota_id');
            $table->string('nama');
            $table->string('klub_asal')->nullable();
            $table->string('klub_tujuan')->nullable();
            $table->string('kota_asal')->nullable();
            $table->string('kota_tujuan')->nullable();
            $table->string('submit_by');
            $table->enum('status', ['Pending', 'Accepted', 'Rejected']);
            $table->string('confirm_by')->nullable();
            $table->string('msg')->nullable();
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
        Schema::dropIfExists('mutasis');
    }
}
