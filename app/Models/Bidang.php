<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    use HasFactory;

    protected $table = 'bidangs';

    protected $fillable = [
        'nama_bidang',
        'slug',
        'deskripsi',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($bidang) {
            if (empty($bidang->slug)) {
                $bidang->slug = static::generateSlug($bidang->nama_bidang);
            }
        });

        static::updating(function ($bidang) {
            if ($bidang->isDirty('nama_bidang')) {
                $bidang->slug = static::generateSlug($bidang->nama_bidang, $bidang->id);
            }
        });
    }

    protected static function generateSlug($name, $id = null)
    {
        $slug = \Illuminate\Support\Str::slug($name);
        $count = static::where('slug', 'like', "{$slug}%")
            ->when($id, fn($q) => $q->where('id', '!=', $id))
            ->count();
        
        return $count ? "{$slug}-" . ($count + 1) : $slug;
    }

    /**
     * Relasi ke AnggotaBidang
     */
    public function anggota()
    {
        return $this->hasMany(AnggotaBidang::class, 'bidang_id');
    }

    /**
     * Relasi ke Kegiatan
     */
    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class, 'bidang_id');
    }

    /**
     * Relasi ke TransaksiKeuangan
     */
    public function transaksiKeuangan()
    {
        return $this->hasMany(TransaksiKeuangan::class, 'bidang_id');
    }

    /**
     * Relasi ke BidangProgramKerja
     */
    public function programKerja()
    {
        return $this->hasMany(BidangProgramKerja::class, 'bidang_id');
    }

    /**
     * Relasi ke TargetProgram
     */
    public function targetProgram()
    {
        return $this->hasMany(TargetProgram::class, 'bidang_id');
    }

    /**
     * Accessor untuk jumlah anggota
     */
    public function getJumlahAnggotaAttribute()
    {
        return $this->anggota()->count();
    }

    /**
     * Accessor untuk jumlah kegiatan
     */
    public function getJumlahKegiatanAttribute()
    {
        return $this->kegiatan()->count();
    }

    /**
     * Get meta description for SEO
     */
    public function getMetaDescriptionAttribute()
    {
        $desc = strip_tags($this->deskripsi);
        return \Illuminate\Support\Str::limit($desc ?: "Informasi lengkap tentang {$this->nama_bidang} Masjid Merah Baiturrahman", 155);
    }
}
