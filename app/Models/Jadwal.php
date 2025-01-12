<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';

    protected $fillable = [
        'tanggal_jalan',
        'jam_jalan',
        'lokasi_jemput',
        'lokasi_tujuan',
        'id_supir',
        'id_mobil',
        'status'
    ];

    public function supir()
    {
        return $this->belongsTo(User::class, 'id_supir');
    }

    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'id_mobil');
    }
}
