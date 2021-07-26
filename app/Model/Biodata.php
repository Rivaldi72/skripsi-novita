<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Biodata;

class Biodata extends Model
{
    protected $table = 'biodata';

    protected $primaryKey = 'id_biodata';

    protected $fillable = [
        'id_biodata',
        'id_user',
        'nama',
        'tanggal_lahir',
        'tempat_lahir',
        'jenis_kelamin',
        'status',
        'alamat',
        'email',
        'no_hp',
        'pendidikan_terakhir',
        // 'pengalaman_kerja',
        'jurusan_pendidikan',
        'ipk',
        // 'wawancara',
        // 'psikotest',
        // 'kemampuan_bahasa_asing',
        'ktp',
        'pas_poto',
        'ijazah',
        'transkrip_nilai',
        'portofolio'
    ];

    public function pengalamanKerja()
    {
        return $this->hasMany('App\Model\PengalamanKerja', 'id_user', 'id_user');
    }

    public function kemampuanBahasaAsing()
    {
        return $this->hasMany('App\Model\KemampuanBahasaAsing', 'id_user', 'id_user');
    }
}
