<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsetFoto extends Model
{
    use HasFactory;

    protected $table = 'aset_foto';

    public $timestamps = false;

    protected $fillable = [
        'aset_id',
        'foto',
    ];

    /**
     * Relasi ke Aset
     */
    public function aset()
    {
        return $this->belongsTo(Aset::class, 'aset_id');
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
