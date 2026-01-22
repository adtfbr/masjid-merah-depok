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
        Schema::create('pengurus_inti', function (Blueprint $table) {
            $table->id();
            $table->enum('tipe', ['pembina', 'pengawas', 'ketua', 'sekretaris', 'bendahara']);
            $table->string('nama', 200);
            $table->string('foto', 255)->nullable();
            $table->string('kontak', 50)->nullable();
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengurus_inti');
    }
};
