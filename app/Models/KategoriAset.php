<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriAset extends Model
{
    protected $table = 'kategori_aset';

    protected $fillable = [
        'nama_kategori',
        'foto'
    ];

    /**
     * Relasi ke Aset
     */
    public function aset()
    {
        return $this->hasMany(Aset::class, 'kategori_id');
    }

    /**
     * Accessor untuk URL foto
     */
    public function getFotoUrlAttribute()
    {
        if ($this->foto) {
            return asset('storage/' . $this->foto);
        }
        return null;
    }
}
