<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $fillable = ['nama', 'posisi', 'proyek_id'];

    // Setiap karyawan hanya memiliki satu proyek
    public function proyek()
    {
        return $this->belongsTo(Proyek::class);
    }
}