<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pemeliharaan_aset', function (Blueprint $table) {
            $table->bigIncrements('pemeliharaan_id');
            $table->unsignedBigInteger('aset_id');
            $table->date('tanggal');
            $table->string('tindakan');
            $table->decimal('biaya', 15, 2)->default(0);
            $table->string('pelaksana')->nullable();
            $table->timestamps();

            $table->foreign('aset_id')
                  ->references('aset_id')
                  ->on('aset')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pemeliharaan_aset');
    }
};
