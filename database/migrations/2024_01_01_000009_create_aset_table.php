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
        Schema::create('aset', function (Blueprint $table) {
            $table->id();
            $table->string('nama_aset', 200);
            $table->string('kategori', 100);
            $table->decimal('nilai', 15, 2);
            $table->string('kondisi', 100);
            $table->string('lokasi', 200);
            $table->timestamps();
            
            $table->index('kategori');
            $table->index('kondisi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aset');
    }
};
