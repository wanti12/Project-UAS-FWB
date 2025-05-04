<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('warga');
        });


        Schema::create('wargas', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->string('nama');
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        
        Schema::create('pemerintahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('jabatan')->nullable();
            $table->timestamps();
        });

        
        Schema::create('penyelenggaras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nama_organisasi')->nullable();
            $table->timestamps();
        });

        
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi');
            $table->date('tanggal');
            $table->string('lokasi');
            $table->enum('status', ['pending', 'approved', 'rejected']);
            $table->foreignId('penyelenggara_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warga_id')->constrained('wargas')->onDelete('cascade');
            $table->foreignId('kegiatan_id')->constrained('kegiatans')->onDelete('cascade');
            $table->timestamps();
        });

        
        Schema::create('komentars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warga_id')->constrained('wargas')->onDelete('cascade');
            $table->foreignId('kegiatan_id')->constrained('kegiatans')->onDelete('cascade');
            $table->text('isi_komentar');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
        Schema::dropIfExists('kegiatans');
        Schema::dropIfExists('penyelenggaras');
        Schema::dropIfExists('pemerintahs');
        Schema::dropIfExists('wargas');
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};
