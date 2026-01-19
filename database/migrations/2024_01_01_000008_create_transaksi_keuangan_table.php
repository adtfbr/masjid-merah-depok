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
        Schema::create('transaksi_keuangan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('akun_id')->constrained('akun_keuangan')->onDelete('cascade');
            $table->foreignId('bidang_id')->nullable()->constrained('bidangs')->onDelete('set null');
            $table->date('tanggal');
            $table->decimal('jumlah', 15, 2);
            $table->text('keterangan')->nullable();
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
            
            $table->index('akun_id');
            $table->index('bidang_id');
            $table->index('tanggal');
            $table->index('created_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_keuangan');
    }
};
