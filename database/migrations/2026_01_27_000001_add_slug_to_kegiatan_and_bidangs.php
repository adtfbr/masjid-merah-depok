<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Add slug to kegiatan if not exists
        if (!Schema::hasColumn('kegiatan', 'slug')) {
            Schema::table('kegiatan', function (Blueprint $table) {
                $table->string('slug', 250)->nullable()->after('nama_kegiatan');
            });
        }

        // Generate slugs for existing kegiatan
        $kegiatans = DB::table('kegiatan')->whereNull('slug')->orWhere('slug', '')->get();
        foreach ($kegiatans as $kegiatan) {
            $slug = \Illuminate\Support\Str::slug($kegiatan->nama_kegiatan);
            
            // Check uniqueness
            $count = DB::table('kegiatan')
                ->where('slug', 'like', "{$slug}%")
                ->where('id', '!=', $kegiatan->id)
                ->count();
            
            if ($count > 0) {
                $slug = "{$slug}-{$kegiatan->id}";
            }
            
            DB::table('kegiatan')
                ->where('id', $kegiatan->id)
                ->update(['slug' => $slug]);
        }

        // Add unique constraint if not exists
        $indexes = DB::select("SHOW INDEX FROM kegiatan WHERE Key_name = 'kegiatan_slug_unique'");
        if (empty($indexes)) {
            Schema::table('kegiatan', function (Blueprint $table) {
                $table->unique('slug');
            });
        }

        // Add index if not exists
        $indexes = DB::select("SHOW INDEX FROM kegiatan WHERE Key_name = 'kegiatan_slug_index'");
        if (empty($indexes)) {
            Schema::table('kegiatan', function (Blueprint $table) {
                $table->index('slug');
            });
        }

        // Add slug to bidangs if not exists
        if (!Schema::hasColumn('bidangs', 'slug')) {
            Schema::table('bidangs', function (Blueprint $table) {
                $table->string('slug', 200)->nullable()->after('nama_bidang');
            });
        }

        // Generate slugs for existing bidangs
        $bidangs = DB::table('bidangs')->whereNull('slug')->orWhere('slug', '')->get();
        foreach ($bidangs as $bidang) {
            $slug = \Illuminate\Support\Str::slug($bidang->nama_bidang);
            
            // Check uniqueness
            $count = DB::table('bidangs')
                ->where('slug', 'like', "{$slug}%")
                ->where('id', '!=', $bidang->id)
                ->count();
            
            if ($count > 0) {
                $slug = "{$slug}-{$bidang->id}";
            }
            
            DB::table('bidangs')
                ->where('id', $bidang->id)
                ->update(['slug' => $slug]);
        }

        // Add unique constraint if not exists
        $indexes = DB::select("SHOW INDEX FROM bidangs WHERE Key_name = 'bidangs_slug_unique'");
        if (empty($indexes)) {
            Schema::table('bidangs', function (Blueprint $table) {
                $table->unique('slug');
            });
        }

        // Add index if not exists
        $indexes = DB::select("SHOW INDEX FROM bidangs WHERE Key_name = 'bidangs_slug_index'");
        if (empty($indexes)) {
            Schema::table('bidangs', function (Blueprint $table) {
                $table->index('slug');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('kegiatan', 'slug')) {
            Schema::table('kegiatan', function (Blueprint $table) {
                $table->dropIndex(['slug']);
                $table->dropUnique(['slug']);
                $table->dropColumn('slug');
            });
        }

        if (Schema::hasColumn('bidangs', 'slug')) {
            Schema::table('bidangs', function (Blueprint $table) {
                $table->dropIndex(['slug']);
                $table->dropUnique(['slug']);
                $table->dropColumn('slug');
            });
        }
    }
};
