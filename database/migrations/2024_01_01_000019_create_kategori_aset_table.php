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
        // Buat tabel kategori_aset
        Schema::create('kategori_aset', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori');
            $table->string('foto')->nullable();
            $table->timestamps();
        });

        // Ubah tabel aset - hapus kolom yang tidak perlu, tambah kategori_id
        Schema::table('aset', function (Blueprint $table) {
            // Tambah kolom kategori_id
            $table->foreignId('kategori_id')->nullable()->after('id')->constrained('kategori_aset')->onDelete('cascade');
            
            // Drop kolom yang tidak diperlukan jika ada
            if (Schema::hasColumn('aset', 'nilai')) {
                $table->dropColumn('nilai');
            }
            if (Schema::hasColumn('aset', 'tahun_perolehan')) {
                $table->dropColumn('tahun_perolehan');
            }
            if (Schema::hasColumn('aset', 'kategori')) {
                $table->dropColumn('kategori');
            }
            if (Schema::hasColumn('aset', 'lokasi')) {
                $table->dropColumn('lokasi');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('aset', function (Blueprint $table) {
            $table->dropForeign(['kategori_id']);
            $table->dropColumn('kategori_id');
            
            // Restore columns if needed
            if (!Schema::hasColumn('aset', 'kategori')) {
                $table->string('kategori', 100)->nullable();
            }
            if (!Schema::hasColumn('aset', 'nilai')) {
                $table->decimal('nilai', 15, 2)->default(0);
            }
            if (!Schema::hasColumn('aset', 'lokasi')) {
                $table->string('lokasi', 200)->nullable();
            }
        });

        Schema::dropIfExists('kategori_aset');
    }
};
