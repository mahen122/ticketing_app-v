<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table = 'lokasi';
    protected $fillable = [
        'nama_lokasi',
        'aktif',
    ];

    // Scope untuk hanya mengambil data aktif = 'Y'
    public function scopeAktif($query)
    {
        return $query->where('aktif', 'Y');
    }

    // Relasi: Lokasi memiliki banyak Event
    public function events()
    {
        return $this->hasMany(Event::class, 'lokasi_id');
    }
}
