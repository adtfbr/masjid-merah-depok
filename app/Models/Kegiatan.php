<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';

    protected $fillable = [
        'bidang_id',
        'nama_kegiatan',
        'slug',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_selesai',
        'lokasi',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($kegiatan) {
            if (empty($kegiatan->slug)) {
                $kegiatan->slug = static::generateSlug($kegiatan->nama_kegiatan);
            }
        });

        static::updating(function ($kegiatan) {
            if ($kegiatan->isDirty('nama_kegiatan')) {
                $kegiatan->slug = static::generateSlug($kegiatan->nama_kegiatan, $kegiatan->id);
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
     * Relasi ke Bidang
     */
    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'bidang_id');
    }

    /**
     * Relasi many-to-many dengan AnggotaBidang
     */
    public function anggota()
    {
        return $this->belongsToMany(
            AnggotaBidang::class,
            'kegiatan_anggota',
            'kegiatan_id',
            'anggota_id'
        );
    }

    /**
     * Relasi ke KegiatanFoto
     */
    public function foto()
    {
        return $this->hasMany(KegiatanFoto::class, 'kegiatan_id');
    }

    /**
     * Scope untuk kegiatan yang sedang berlangsung
     */
    public function scopeAktif($query)
    {
        return $query->where('tanggal_mulai', '<=', now())
                     ->where(function($q) {
                         $q->whereNull('tanggal_selesai')
                           ->orWhere('tanggal_selesai', '>=', now());
                     });
    }

    /**
     * Accessor untuk status kegiatan
     */
    public function getStatusAttribute()
    {
        $now = now()->startOfDay();
        $mulai = $this->tanggal_mulai;
        $selesai = $this->tanggal_selesai;

        if ($now->lt($mulai)) {
            return 'Akan Datang';
        } elseif ($now->between($mulai, $selesai ?? $now)) {
            return 'Berlangsung';
        } else {
            return 'Selesai';
        }
    }

    /**
     * Get meta description for SEO
     */
    public function getMetaDescriptionAttribute()
    {
        $desc = strip_tags($this->deskripsi);
        return \Illuminate\Support\Str::limit($desc, 155);
    }

    /**
     * Get OG Image
     */
    public function getOgImageAttribute()
    {
        if ($this->foto->count() > 0) {
            return asset('storage/' . $this->foto->first()->foto);
        }
        return asset('images/hero-masjid.jpg');
    }
}
