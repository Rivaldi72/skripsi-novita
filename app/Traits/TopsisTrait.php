<?php

namespace App\Traits;

use App\Model\Seleksi;
use App\Model\Kriteria;
use App\Model\User;

trait TopsisTrait
{

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
        $users = User::where('jabatan', 'pelamar')->where('is_rated', true)->get();
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
        $users = User::where('jabatan', 'pelamar')->where('is_rated', true)->get();
        $result[] = 0;
        $jarakNilaiIdeal = self::jarakNilaiIdeal();

        foreach ($users as $key => $pelamar) {

            $result[$key] = $jarakNilaiIdeal['resultMin'][$key] / ($jarakNilaiIdeal['resultMin'][$key] + $jarakNilaiIdeal['resultMax'][$key]);
            $result[$key] = round($result[$key], 4);
        }
        return $result;
    }
}
