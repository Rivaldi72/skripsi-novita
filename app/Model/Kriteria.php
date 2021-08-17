<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $table = 'kriteria';

    protected $primaryKey = 'id_kriteria';

    protected $fillable = [
        'id_kriteria',
        'kriteria',
        'bobot',
        'jenis'
    ];

    public function nilai()
    {
        return $this->hasMany('App\Model\Seleksi', 'id_kriteria', 'id_kriteria');
    }
}
