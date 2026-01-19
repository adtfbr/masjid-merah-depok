<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiKeuangan extends Model
{
    use HasFactory;

    protected $table = 'transaksi_keuangan';

    protected $fillable = [
        'akun_id',
        'bidang_id',
        'tanggal',
        'jumlah',
        'keterangan',
        'created_by',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'jumlah' => 'decimal:2',
    ];

    /**
     * Relasi ke AkunKeuangan
     */
    public function akun()
    {
        return $this->belongsTo(AkunKeuangan::class, 'akun_id');
    }

    /**
     * Relasi ke Bidang
     */
    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'bidang_id');
    }

    /**
     * Relasi ke User (created_by)
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Scope untuk transaksi pemasukan
     */
    public function scopePemasukan($query)
    {
        return $query->whereHas('akun', function($q) {
            $q->where('tipe', 'pemasukan');
        });
    }

    /**
     * Scope untuk transaksi pengeluaran
     */
    public function scopePengeluaran($query)
    {
        return $query->whereHas('akun', function($q) {
            $q->where('tipe', 'pengeluaran');
        });
    }

    /**
     * Scope untuk filter berdasarkan periode
     */
    public function scopePeriode($query, $start, $end)
    {
        return $query->whereBetween('tanggal', [$start, $end]);
    }

    /**
     * Accessor untuk format jumlah
     */
    public function getJumlahFormatAttribute()
    {
        return 'Rp ' . number_format($this->jumlah, 0, ',', '.');
    }
}
