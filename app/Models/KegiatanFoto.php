<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanFoto extends Model
{
    use HasFactory;

    protected $table = 'kegiatan_foto';

    public $timestamps = false;

    protected $fillable = [
        'kegiatan_id',
        'foto',
        'keterangan',
    ];

    /**
     * Relasi ke Kegiatan
     */
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id');
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
