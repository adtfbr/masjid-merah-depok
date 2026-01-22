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
        'urutan'
    ];

    protected $casts = [
        'bidang_id' => 'integer',
        'urutan' => 'integer'
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
     * Scope untuk ordering berdasarkan urutan
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan');
    }
}
