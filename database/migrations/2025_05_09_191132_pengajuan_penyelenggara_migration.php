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
       Schema::create('pengajuan_penyelenggaras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kegiatan_id')->constrained('kegiatans')->onDelete('cascade');
            $table->foreignId('penyelenggara_id')->constrained('users')->onDelete('cascade');
            $table->enum('status_pengajuan', ['diajukan', 'disetujui', 'ditolak'])->default('diajukan');
            $table->timestamp('tanggal_pengajuan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengajuan_penyelenggaras');
    }
};
