<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profil', function (Blueprint $table) {
            $table->increments('id_profil');
            $table->string('nama_sekolah');
            $table->string('kepala_sekolah')->nullable();
            $table->string('foto')->nullable();
            $table->string('logo')->nullable();
            $table->string('npsn', 10);
            $table->text('alamat');
            $table->string('kontak', 15)->nullable();
            $table->text('visi_misi')->nullable();
            $table->year('tahun_berdiri')->nullable();
            $table->text('deskripsi')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profil');
    }
};
