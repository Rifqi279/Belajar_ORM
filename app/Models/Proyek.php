<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    protected $fillable = ['nama_proyek', 'deadline', 'status'];

    // Satu proyek memiliki banyak karyawan
    public function karyawans()
    {
        return $this->hasMany(Karyawan::class);
    }
}