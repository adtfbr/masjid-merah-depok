<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkunKeuangan extends Model
{
    use HasFactory;

    protected $table = 'akun_keuangan';

    protected $fillable = [
        'nama_akun',
        'tipe',
    ];

    /**
     * Relasi ke TransaksiKeuangan
     */
    public function transaksi()
    {
        return $this->hasMany(TransaksiKeuangan::class, 'akun_id');
    }

    /**
     * Scope untuk akun pemasukan
     */
    public function scopePemasukan($query)
    {
        return $query->where('tipe', 'pemasukan');
    }

    /**
     * Scope untuk akun pengeluaran
     */
    public function scopePengeluaran($query)
    {
        return $query->where('tipe', 'pengeluaran');
    }

    /**
     * Accessor untuk total transaksi
     */
    public function getTotalTransaksiAttribute()
    {
        return $this->transaksi()->sum('jumlah');
    }
}
