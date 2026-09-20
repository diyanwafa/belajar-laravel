<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menambahkan kolom tanggal_lahir ke tabel users.
     */
    public function up(): void
    {
        if (!Schema::hasColumn('users', 'tanggal_lahir')) {
            Schema::table('users', function (Blueprint $table) {
                $table->date('tanggal_lahir')
                    ->nullable()
                    ->after('nama');
            });
        }
    }

    /**
     * Menghapus kolom tanggal_lahir jika migration dibatalkan.
     */
    public function down(): void
    {
        if (Schema::hasColumn('users', 'tanggal_lahir')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('tanggal_lahir');
            });
        }
    }
};