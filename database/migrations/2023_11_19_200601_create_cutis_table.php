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
        Schema::create('cutis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pengajuan');
            $table->string('keperluan');
            $table->date('mulai_cuti');
            $table->date('akhir_cuti');
            $table->enum('status',['menunggu','perbaikan','disetujui','ditolak'])->nullable();
            $table->string('id_pegawai_cuti')->nullable();
            $table->string('id_pegawai_pengganti')->nullable();
            $table->string('id_pegawai_hrd')->nullable();
            $table->string('catatan_hrd')->nullable();
            $table->timestamps();

            $table->foreign('id_pegawai_cuti')->references('id_user')->on('pegawais');
            $table->foreign('id_pegawai_pengganti')->references('id_user')->on('pegawais');
            $table->foreign('id_pegawai_hrd')->references('id_user')->on('pegawais');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cutis');
    }
};
