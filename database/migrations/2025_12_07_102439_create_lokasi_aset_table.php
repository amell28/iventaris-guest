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
        Schema::create('lokasi_aset', function (Blueprint $table) {
            $table->id('lokasi_id');

            // Foreign key ke aset
            $table->unsignedBigInteger('aset_id');
            $table->foreign('aset_id')->references('aset_id')->on('aset')->onDelete('cascade');

            $table->string('keterangan')->nullable();
            $table->text('lokasi_text')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->timestamps();

            // ==== RELASI MEDIA (CATATAN) ====
            // media.ref_table = 'lokasi_aset'
            // media.ref_id    = lokasi_id
            // Tidak perlu foreign key ke tabel media,
            // karena media memakai sistem ref_table/ref_id.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lokasi_aset');
    }
};
