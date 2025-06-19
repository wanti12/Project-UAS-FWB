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
        Schema::create('pendaftaran_kegiatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kegiatan_id')->constrained('kegiatans')->onDelete('cascade');
            $table->foreignId('warga_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['kegiatan_id', 'warga_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_kegiatans');
    }
};
