<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrukturGambar extends Model
{
    use HasFactory;

    protected $table = 'struktur_gambar';

    protected $fillable = [
        'gambar',
        'aktif'
    ];

    protected $casts = [
        'aktif' => 'boolean'
    ];

    /**
     * Scope untuk hanya gambar aktif
     */
    public function scopeAktif($query)
    {
        return $query->where('aktif', true);
    }

    /**
     * Get full URL gambar
     */
    public function getGambarUrlAttribute()
    {
        if ($this->gambar) {
            return asset('storage/' . $this->gambar);
        }
        return null;
    }
}
