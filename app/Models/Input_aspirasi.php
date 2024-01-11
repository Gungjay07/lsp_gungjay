<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Input_aspirasi extends Model
{
    use HasFactory;
    protected $fillable = ['gambar','nik','kategori_id','lokasi','ket','id_aspirasi'];
    protected $with = ['siswa'];

    public function aspirasi()
    {
        return $this->belongsTo(Aspirasi::class, 'id_aspirasi');
    }

    public function siswa() {
        return $this->belongsTo(Siswa::class, 'nik');
    }
}
