<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id('media_id');

            // Nama tabel yang direferensikan (aset, lokasi_aset, pemeliharaan_aset, dsb)
            $table->string('ref_table');

            // ID data pada tabel tersebut
            $table->unsignedBigInteger('ref_id');

            // Lokasi file dalam storage/public
            $table->string('file_url');

            // Optional caption deskripsi foto
            $table->string('caption')->nullable();

            // Tipe file (image/jpeg, image/png, application/pdf, dll)
            $table->string('mime_type')->nullable();

            // Urutan foto
            $table->integer('sort_order')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
