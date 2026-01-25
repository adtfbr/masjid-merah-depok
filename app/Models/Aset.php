<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    use HasFactory;

    protected $table = 'aset';

    protected $fillable = [
        'kategori_id',
        'nama_aset',
        'kondisi',
    ];

    /**
     * Relasi ke KategoriAset
     */
    public function kategori()
    {
        return $this->belongsTo(KategoriAset::class, 'kategori_id');
    }

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
    public function scopeByKategori($query, $kategoriId)
    {
        return $query->where('kategori_id', $kategoriId);
    }

    /**
     * Scope filter berdasarkan kondisi
     */
    public function scopeKondisi($query, $kondisi)
    {
        return $query->where('kondisi', $kondisi);
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
