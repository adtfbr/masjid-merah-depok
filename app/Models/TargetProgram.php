<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TargetProgram extends Model
{
    use HasFactory;

    protected $table = 'target_program';

    protected $fillable = [
        'bidang_id',
        'nomor_urut',
        'judul',
        'deskripsi'
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
