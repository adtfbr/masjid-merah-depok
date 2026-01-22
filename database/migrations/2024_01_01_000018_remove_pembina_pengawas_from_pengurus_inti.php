<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Delete existing data dengan tipe pembina dan pengawas
        DB::table('pengurus_inti')->whereIn('tipe', ['pembina', 'pengawas'])->delete();
        
        // Update enum tipe - hanya ketua, sekretaris, bendahara
        DB::statement("ALTER TABLE pengurus_inti MODIFY COLUMN tipe ENUM('ketua', 'sekretaris', 'bendahara') NOT NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Restore enum tipe dengan pembina dan pengawas
        DB::statement("ALTER TABLE pengurus_inti MODIFY COLUMN tipe ENUM('pembina', 'pengawas', 'ketua', 'sekretaris', 'bendahara') NOT NULL");
    }
};
