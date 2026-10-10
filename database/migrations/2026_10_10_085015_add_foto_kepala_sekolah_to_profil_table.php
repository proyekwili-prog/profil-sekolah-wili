<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profil', function (Blueprint $table) {
            $table->string('foto_kepala_sekolah')->nullable();
            $table->longText('sambutan_kepala_sekolah')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('profil', function (Blueprint $table) {
            $table->dropColumn([
                'foto_kepala_sekolah',
                'sambutan_kepala_sekolah',
            ]);
        });
    }
};