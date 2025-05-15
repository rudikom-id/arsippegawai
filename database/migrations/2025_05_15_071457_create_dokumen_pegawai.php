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
        Schema::create('dokumen_pegawai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('jenis_dokumen', ['pas_foto', 'ktp', 'kk', 'ijazah', 'transkrip', 'npwp', 'bpjs', 'surat_tugas', 'str', 'sip', 'sertifikat_pelatihan']);
            $table->string('file_path');
            $table->enum('status_validasi', ['pending', 'valid', 'invalid'])->default('pending');
            $table->text('keterangan_validasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumen_pegawai');
    }
};
