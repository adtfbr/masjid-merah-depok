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
        Schema::table('bidang_program_kerja', function (Blueprint $table) {
            // Rename column urutan to nomor_urut
            $table->renameColumn('urutan', 'nomor_urut');
        });
        
        Schema::table('bidang_program_kerja', function (Blueprint $table) {
            // Add deskripsi column if not exists
            if (!Schema::hasColumn('bidang_program_kerja', 'deskripsi')) {
                $table->text('deskripsi')->nullable()->after('judul');
            }
            
            // Change nomor_urut default to 1
            $table->integer('nomor_urut')->default(1)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bidang_program_kerja', function (Blueprint $table) {
            $table->renameColumn('nomor_urut', 'urutan');
        });
        
        Schema::table('bidang_program_kerja', function (Blueprint $table) {
            if (Schema::hasColumn('bidang_program_kerja', 'deskripsi')) {
                $table->dropColumn('deskripsi');
            }
            $table->integer('urutan')->default(0)->change();
        });
    }
};
