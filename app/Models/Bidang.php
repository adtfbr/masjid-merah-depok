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
        'deskripsi',
    ];

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
}
