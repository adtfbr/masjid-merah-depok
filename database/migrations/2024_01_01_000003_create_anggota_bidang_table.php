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
        Schema::create('anggota_bidang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bidang_id')->constrained('bidangs')->onDelete('cascade');
            $table->string('nama', 150);
            $table->string('jabatan', 100);
            $table->string('foto', 255)->nullable();
            $table->string('no_hp', 20)->nullable();
            $table->timestamps();
            
            $table->index('bidang_id');
            $table->index('nama');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota_bidang');
    }
};
