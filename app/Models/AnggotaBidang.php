<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaBidang extends Model
{
    use HasFactory;

    protected $table = 'anggota_bidang';

    protected $fillable = [
        'bidang_id',
        'nama',
        'jabatan',
        'seksi',
        'foto',
        'no_hp',
        'urutan',
    ];

    /**
     * Scope untuk filter by seksi
     */
    public function scopeSeksi($query, $seksi)
    {
        return $query->where('seksi', $seksi);
    }

    /**
     * Scope untuk order by urutan
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan')->orderBy('nama');
    }

    /**
     * Scope untuk ketua bidang
     */
    public function scopeKetuaBidang($query)
    {
        return $query->where('jabatan', 'LIKE', '%Ketua%')->orWhere('jabatan', 'LIKE', '%Koordinator%');
    }

    /**
     * Relasi ke Bidang
     */
    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'bidang_id');
    }

    /**
     * Relasi many-to-many dengan Kegiatan
     */
    public function kegiatan()
    {
        return $this->belongsToMany(
            Kegiatan::class,
            'kegiatan_anggota',
            'anggota_id',
            'kegiatan_id'
        );
    }

    /**
     * Accessor untuk URL foto
     */
    public function getFotoUrlAttribute()
    {
        if ($this->foto) {
            return asset('storage/' . $this->foto);
        }
        return asset('images/default-avatar.png');
    }
}
