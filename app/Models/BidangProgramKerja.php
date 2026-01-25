<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidangProgramKerja extends Model
{
    use HasFactory;

    protected $table = 'bidang_program_kerja';

    protected $fillable = [
        'bidang_id',
        'judul',
        'deskripsi',
        'nomor_urut'
    ];

    protected $casts = [
        'bidang_id' => 'integer',
        'nomor_urut' => 'integer'
    ];

    /**
     * Relasi ke Bidang
     */
    public function bidang()
    {
        return $this->belongsTo(Bidang::class);
    }

    /**
     * Scope untuk filter berdasarkan bidang
     */
    public function scopeBidang($query, $bidangId)
    {
        return $query->where('bidang_id', $bidangId);
    }

    /**
     * Scope untuk ordering berdasarkan nomor urut
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('nomor_urut');
    }
}
