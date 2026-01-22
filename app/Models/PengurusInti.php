<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengurusInti extends Model
{
    use HasFactory;

    protected $table = 'pengurus_inti';

    protected $fillable = [
        'tipe',
        'nama',
        'foto',
        'kontak',
        'urutan'
    ];

    protected $casts = [
        'urutan' => 'integer'
    ];

    /**
     * Scope untuk filter berdasarkan tipe
     */
    public function scopeTipe($query, $tipe)
    {
        return $query->where('tipe', $tipe);
    }

    /**
     * Scope untuk ordering berdasarkan urutan
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan');
    }

    /**
     * Get label untuk tipe
     */
    public function getTipeLabelAttribute()
    {
        $labels = [
            'ketua' => 'Ketua',
            'sekretaris' => 'Sekretaris',
            'bendahara' => 'Bendahara'
        ];

        return $labels[$this->tipe] ?? $this->tipe;
    }

    /**
     * Get full URL foto
     */
    public function getFotoUrlAttribute()
    {
        if ($this->foto) {
            return asset('storage/' . $this->foto);
        }
        return asset('images/default-avatar.png');
    }
}
