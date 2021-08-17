<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Seleksi extends Model
{
    protected $table = 'perhitungan_dan_seleksi_nilai';

    protected $primaryKey = 'id_seleksi';

    protected $fillable = [
        'id_user',
        'id_kriteria',
        'nilai'
    ];

    public function user()
    {
        return $this->belongsTo('App\Model\User', 'id_user', 'id_user');
    }
}
