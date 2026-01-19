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
        'foto',
        'no_hp',
    ];

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
