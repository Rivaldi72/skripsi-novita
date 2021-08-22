<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Seleksi;
use App\Model\Kriteria;
use Auth;

class LaporanController extends Controller
{
    public function index()
    {
        // self::maktriksTernormalisasi();
        dd(self::maktriksTernormalisasi(1), self::maktriksKeputusanTernormalisasi(1), self::matriksKeputusanTernormalisasiTerbobot(1), self::solusiIdealPositifDanNegatif(1));
        return view('pages.laporan.index');
    }

    public function maktriksKeputusanTernormalisasi($id)
    {
        $dataNilai = Seleksi::where('id_kriteria', $id)->get();
        $dataTernormalisasi = 0;

        foreach ($dataNilai as $key => $nilai) {
            $dataTernormalisasi += pow($nilai->nilai, 2);
        }

        $dataTernormalisasi = sqrt($dataTernormalisasi);
        
        return $dataTernormalisasi;
    }
    
    public function maktriksTernormalisasi($id)
    {
        $dataNilai = Seleksi::where('id_kriteria', $id)->get();

        $result = [];

        foreach ($dataNilai as $key => $value) {
            $result[$key] = $value->nilai / self::maktriksKeputusanTernormalisasi($id);
        }

        return $result;
    }

    public function matriksKeputusanTernormalisasiTerbobot($id)
    {
        $bobot = Kriteria::where('id_kriteria', $id)->first();
        $data = self::maktriksTernormalisasi($id);
        $result = [];

        foreach ($data as $key => $value) {
            $result[$key] = $value * $bobot->bobot;
        }

        return $result;
    }

    public function solusiIdealPositifDanNegatif($id)
    {
        $min = min(self::matriksKeputusanTernormalisasiTerbobot($id));
        $max = max(self::matriksKeputusanTernormalisasiTerbobot($id));

        return [
            'kriteria' => $id,
            'min'   => $min,
            'max'   => $max
        ];
    }
}
