<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PengalamanKerja extends Model
{
    protected $table = 'pengalaman_kerja';

    protected $fillable = [
        'id_user',
        'perusahaan',
        'jabatan',
        'lama_kerja',
    ];

    public function biodata()
    {
        return $this->belongsTo('App\Model\Biodata', 'id_user', 'id_user');
    }
}
