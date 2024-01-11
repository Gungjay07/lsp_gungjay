<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    use HasFactory;

    protected $fillable = ['gambar','id_aspirasi','kategori_id', 'nik'];
    protected $with = ['input_aspirasi' , 'kategori', 'siswa'];

    public function scopeFillter($query, array $Fillters)
    {
        $query->when($Fillters['search'] ?? false, function($query, $search)
        {
            return $query->where('id_aspirasi', 'like', '%'. $search.'%'); 
        });
        $query->when($Fillters['kategori'] ?? false, function($query, $kategori)
        {
            return $query->where('kategori_id', 'like', '%'. $kategori.'%'); 
        });
        $query->when($Fillters['waktu'] ?? false, function($query, $waktu)
        {
            return $query->where('created_at', 'like', '%'. $waktu.'%'); 
        });
        $query->when($Fillters['status'] ?? false, function($query, $status)
        {
            return $query->where('status', 'like', '%'. $status.'%'); 
        });
    }
    

    public function kategori()  
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
    public function Input_aspirasi()
    {
        return $this->belongsTo(Input_aspirasi::class, 'id_aspirasi');
    }

    public function Siswa() {
        return $this->belongsTo(Siswa::class, 'nik');
    }

}
