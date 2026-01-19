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
        Schema::create('akun_keuangan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_akun', 150);
            $table->enum('tipe', ['pemasukan', 'pengeluaran']);
            $table->timestamps();
            
            $table->index('tipe');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akun_keuangan');
    }
};
