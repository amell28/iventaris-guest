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
        Schema::table('aset', function (Blueprint $table) {
            // 1. Hapus kolom 'kategori' yang lama (bertipe text)
            $table->dropColumn('kategori');

            // 2. Tambah kolom 'kategori_id' sebagai foreign key
            $table->foreignId('kategori_id')->nullable()->constrained('kategori_aset', 'kategori_id')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
