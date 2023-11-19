<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('id_user',18)->unique();
            $table->string('nama');
            $table->string('jabatan');
            $table->unsignedBigInteger('id_departemen');
            $table->string('alamat');
            $table->string('telepon');
            $table->unsignedBigInteger('id_shift');
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('users');
            $table->foreign('id_departemen')->references('id')->on('departemens');
            $table->foreign('id_shift')->references('id')->on('shifts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
