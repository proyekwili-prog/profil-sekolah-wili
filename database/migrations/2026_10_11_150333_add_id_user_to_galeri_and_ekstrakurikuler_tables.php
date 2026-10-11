<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('galeri', function (Blueprint $table) {
            $table->unsignedBigInteger('id_user')
                ->nullable()
                ->index();
        });

        Schema::table('ekstrakurikuler', function (Blueprint $table) {
            $table->unsignedBigInteger('id_user')
                ->nullable()
                ->index();
        });
    }

    public function down(): void
    {
        Schema::table('ekstrakurikuler', function (Blueprint $table) {
            $table->dropIndex(['id_user']);
            $table->dropColumn('id_user');
        });

        Schema::table('galeri', function (Blueprint $table) {
            $table->dropIndex(['id_user']);
            $table->dropColumn('id_user');
        });
    }
};