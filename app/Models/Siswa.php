<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    
    public function Input_aspirasi()
    {
        return $this->hasMany(Input_aspirasi::class);
    }
}
