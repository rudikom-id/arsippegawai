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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['pegawai', 'operator', 'kepala_ruangan'])->after('password');
            $table->foreignId('unit_kerja_id')
                ->nullable()
                ->constrained('unit_kerja')
                ->nullOnDelete()
                ->after('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
            $table->dropForeign(['unit_kerja_id']);
            $table->dropColumn('unit_kerja_id');
        });
    }
};
