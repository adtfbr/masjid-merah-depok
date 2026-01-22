<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TargetKesekretariatan extends Model
{
    use HasFactory;

    protected $table = 'target_kesekretariatan';

    protected $fillable = [
        'tahun',
        'nomor_urut',
        'judul',
        'deskripsi'
    ];

    protected $casts = [
        'tahun' => 'integer',
        'nomor_urut' => 'integer'
    ];

    /**
     * Scope untuk filter berdasarkan tahun
     */
    public function scopeTahun($query, $tahun)
    {
        return $query->where('tahun', $tahun);
    }

    /**
     * Scope untuk ordering berdasarkan nomor urut
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('nomor_urut');
    }
}
