<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KemampuanBahasaAsing extends Model
{
    protected $table = 'kemampuan_bahasa_asing';

    protected $fillable = [
        'id_user',
        'bahasa',
        'read',
        'write',
        'speak',
    ];

    public function biodata()
    {
        return $this->belongsTo('App\Model\Biodata', 'id_user', 'id_user');
    }
}
