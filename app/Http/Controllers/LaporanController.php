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
        // dd(self::maktriksKeputusanTernormalisasi(1), self::maktriksTernormalisasi(1), self::matriksKeputusanTernormalisasiTerbobot(1), self::solusiIdealPositifDanNegatif(1), self::jarakNilaiIdeal(1, 1));
        dd([
            'maktriksTernormalisasi' => self::maktriksTernormalisasi(1),
            'matriksKeputusanTernormalisasiTerbobot' => self::matriksKeputusanTernormalisasiTerbobot(1),
            'solusiIdealPositifDanNegatif(1)' => self::solusiIdealPositifDanNegatif(1),
            'solusiIdealPositifDanNegatif(2)' => self::solusiIdealPositifDanNegatif(2),
            'solusiIdealPositifDanNegatif(3)' => self::solusiIdealPositifDanNegatif(3),
            'solusiIdealPositifDanNegatif(4)' => self::solusiIdealPositifDanNegatif(4),
            'solusiIdealPositifDanNegatif(5)' => self::solusiIdealPositifDanNegatif(5),
            'solusiIdealPositifDanNegatif(6)' => self::solusiIdealPositifDanNegatif(6),
            'solusiIdealPositifDanNegatif(7)' => self::solusiIdealPositifDanNegatif(7),
            'jarakNilaiIdeal' => self::jarakNilaiIdeal(),
            'nilaiPreferensi' => self::nilaiPreferensi(),
        ]);
        return view('pages.laporan.index');
    }

    public function maktriksKeputusanTernormalisasi($id_kriteria)
    {
        $dataNilai = Seleksi::where('id_kriteria', $id_kriteria)->get();
        $dataTernormalisasi = 0;

        foreach ($dataNilai as $key => $nilai) {
            $dataTernormalisasi += pow($nilai->nilai, 2);
        }

        $dataTernormalisasi = sqrt($dataTernormalisasi);
        
        return round($dataTernormalisasi, 4);
    }
    
    public function maktriksTernormalisasi($id_kriteria)
    {
        $dataNilai = Seleksi::where('id_kriteria', $id_kriteria)->get();

        $result = [];

        foreach ($dataNilai as $key => $value) {
            $result[$key] = round($value->nilai / self::maktriksKeputusanTernormalisasi($id_kriteria), 4);
        }

        return $result;
    }

    public function matriksKeputusanTernormalisasiTerbobot($id_kriteria)
    {
        $bobot = Kriteria::where('id_kriteria', $id_kriteria)->first();
        $data = self::maktriksTernormalisasi($id_kriteria);
        $result = [];

        foreach ($data as $key => $value) {
            $result[$key] = round($value * $bobot->bobot, 4);
        }

        return $result;
    }

    public function solusiIdealPositifDanNegatif($id_kriteria)
    {
        $min = min(self::matriksKeputusanTernormalisasiTerbobot($id_kriteria));
        $max = max(self::matriksKeputusanTernormalisasiTerbobot($id_kriteria));

        return [
            'kriteria' => $id_kriteria,
            'min'   => round($min, 4),
            'max'   => round($max, 4)
        ];
    }

    public function jarakNilaiIdeal()
    {
        $dataKriteria = Kriteria::all();
        $users = User::where('jabatan', 'pelamar')->get();
        $resultMin[] = 0;
        $resultMax[] = 0;

        foreach ($users as $key1 => $pelamar) {
            $resultMin[$key1] = 0;
            $resultMax[$key1] = 0;
            foreach ($dataKriteria as $key2 => $kriteria) {
                $dataNilaiTerbobot = self::matriksKeputusanTernormalisasiTerbobot($kriteria->id_kriteria);
                $solusiIdeal = self::solusiIdealPositifDanNegatif($kriteria->id_kriteria);
                $solusiIdealMin = $solusiIdeal['min'];
                $solusiIdealMax = $solusiIdeal['max'];
                if ($key1 < count($dataNilaiTerbobot)) {
                    $resultMin[$key1] += pow($solusiIdealMin - $dataNilaiTerbobot[$key1], 2);
                    $resultMax[$key1] += pow($solusiIdealMax - $dataNilaiTerbobot[$key1], 2);
                }
            }

            $resultMin[$key1] =  sqrt($resultMin[$key1]);
            $resultMax[$key1] =  sqrt($resultMax[$key1]);
            $resultMin[$key1] =  round($resultMin[$key1], 4);
            $resultMax[$key1] =  round($resultMax[$key1], 4);
        }

        return [
                'resultMin'   => $resultMin,
                'resultMax'   => $resultMax
            ];
    }

    public function nilaiPreferensi()
    {
        $users = User::where('jabatan', 'pelamar')->get();
        $result[] = 0;
        $jarakNilaiIdeal = self::jarakNilaiIdeal();

        foreach ($users as $key => $pelamar) {

            if ($key < (count($users) - 1)) {
                $result[$key] = $jarakNilaiIdeal['resultMin'][$key] / ($jarakNilaiIdeal['resultMin'][$key] + $jarakNilaiIdeal['resultMax'][$key]);
                $result[$key] = round($result[$key], 4);
            }

        }
        return $result;
    }

}
