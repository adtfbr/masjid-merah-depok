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
        Schema::table('anggota_bidang', function (Blueprint $table) {
            $table->string('seksi', 100)->nullable()->after('jabatan');
            $table->integer('urutan')->default(0)->after('no_hp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('anggota_bidang', function (Blueprint $table) {
            $table->dropColumn(['seksi', 'urutan']);
        });
    }
};
