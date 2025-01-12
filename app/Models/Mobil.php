<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $table = 'mobil';

    protected $fillable = [
        'kode_wilayah',
        'nomor_polisi',
        'kode_belakang',
        'merk',
        'jenis',
        'tahun',
        'warna'
    ];

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class, 'id_mobil');
    }
}
