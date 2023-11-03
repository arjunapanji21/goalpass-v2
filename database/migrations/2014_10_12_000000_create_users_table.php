<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tmp_lahir')->nullable();
            $table->string('tgl_lahir')->nullable();
            $table->string('telp')->nullable();
            $table->enum('role', ['Unrole', 'Admin Askot/Askab', 'Admin Asprov', 'Super Admin']);
            $table->string('kd_kota')->nullable();
            $table->string('kota_kab')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('username')->unique();
            $table->string('password');
            $table->text('foto')->default('/images/no-profile.webp');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
