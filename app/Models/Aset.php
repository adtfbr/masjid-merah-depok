<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    use HasFactory;

    protected $table = 'aset';

    protected $fillable = [
        'nama_aset',
        'kategori',
        'nilai',
        'kondisi',
        'lokasi',
    ];

    protected $casts = [
        'nilai' => 'decimal:2',
    ];

    /**
     * Relasi ke AsetFoto
     */
    public function foto()
    {
        return $this->hasMany(AsetFoto::class, 'aset_id');
    }

    /**
     * Scope filter berdasarkan kategori
     */
    public function scopeKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }

    /**
     * Scope filter berdasarkan kondisi
     */
    public function scopeKondisi($query, $kondisi)
    {
        return $query->where('kondisi', $kondisi);
    }

    /**
     * Accessor untuk format nilai
     */
    public function getNilaiFormatAttribute()
    {
        return 'Rp ' . number_format($this->nilai, 0, ',', '.');
    }

    /**
     * Accessor untuk badge kondisi
     */
    public function getKondisiBadgeAttribute()
    {
        $badges = [
            'Baik' => 'success',
            'Cukup' => 'warning',
            'Rusak' => 'danger',
        ];

        return $badges[$this->kondisi] ?? 'secondary';
    }
}
