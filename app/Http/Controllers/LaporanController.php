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
        $dataUser = User::where('jabatan', 'pelamar')->get();
        $dataNilaiAwal = self::nilaiPreferensi();
        $dataNilai = self::nilaiPreferensi();
        arsort($dataNilai);
        $dataNilaiSort = [];
        $i = 0;

        foreach ($dataNilai as $key => $value) {
            $dataNilaiSort[$i] = $value;
            $i++;
        }
        // dd( $dataNilaiSort);
        $dataPeringkat = [];

        // dd([
        //     'maktriksKeputusanTernormalisasi1' => self::maktriksKeputusanTernormalisasi(1),
        //     'maktriksKeputusanTernormalisasi2' => self::maktriksKeputusanTernormalisasi(2),
        //     'maktriksKeputusanTernormalisasi3' => self::maktriksKeputusanTernormalisasi(3),
        //     'maktriksKeputusanTernormalisasi4' => self::maktriksKeputusanTernormalisasi(4),
        //     'maktriksKeputusanTernormalisasi5' => self::maktriksKeputusanTernormalisasi(5),
        //     'maktriksKeputusanTernormalisasi6' => self::maktriksKeputusanTernormalisasi(6),
        //     'maktriksKeputusanTernormalisasi7' => self::maktriksKeputusanTernormalisasi(7),
        //     'maktriksTernormalisasi1' => self::maktriksTernormalisasi(1),
        //     'maktriksTernormalisasi2' => self::maktriksTernormalisasi(2),
        //     'maktriksTernormalisasi3' => self::maktriksTernormalisasi(3),
        //     'maktriksTernormalisasi4' => self::maktriksTernormalisasi(4),
        //     'maktriksTernormalisasi5' => self::maktriksTernormalisasi(5),
        //     'maktriksTernormalisasi6' => self::maktriksTernormalisasi(6),
        //     'maktriksTernormalisasi7' => self::maktriksTernormalisasi(7),
        //     'matriksKeputusanTernormalisasiTerbobot1' => self::matriksKeputusanTernormalisasiTerbobot(1),
        //     'matriksKeputusanTernormalisasiTerbobot2' => self::matriksKeputusanTernormalisasiTerbobot(2),
        //     'matriksKeputusanTernormalisasiTerbobot3' => self::matriksKeputusanTernormalisasiTerbobot(3),
        //     'matriksKeputusanTernormalisasiTerbobot4' => self::matriksKeputusanTernormalisasiTerbobot(4),
        //     'matriksKeputusanTernormalisasiTerbobot5' => self::matriksKeputusanTernormalisasiTerbobot(5),
        //     'matriksKeputusanTernormalisasiTerbobot6' => self::matriksKeputusanTernormalisasiTerbobot(6),
        //     'matriksKeputusanTernormalisasiTerbobot7' => self::matriksKeputusanTernormalisasiTerbobot(7),
        //     'solusiIdealPositifDanNegatif1' => self::solusiIdealPositifDanNegatif(1),
        //     'solusiIdealPositifDanNegatif2' => self::solusiIdealPositifDanNegatif(2),
        //     'solusiIdealPositifDanNegatif3' => self::solusiIdealPositifDanNegatif(3),
        //     'solusiIdealPositifDanNegatif4' => self::solusiIdealPositifDanNegatif(4),
        //     'solusiIdealPositifDanNegatif5' => self::solusiIdealPositifDanNegatif(5),
        //     'solusiIdealPositifDanNegatif6' => self::solusiIdealPositifDanNegatif(6),
        //     'solusiIdealPositifDanNegatif7' => self::solusiIdealPositifDanNegatif(7),
        //     'jarakNilaiIdeal' => self::jarakNilaiIdeal(),
        //     'nilaiPreferensiAwal' => self::nilaiPreferensi(),
        //     'nilaiPreferensi' => $dataNilaiSort,
        // ]);

        return view('pages.laporan.index', compact('dataUser', 'dataNilaiAwal', 'dataNilai', 'dataNilaiSort'));
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
                // if ($key1 < count($dataNilaiTerbobot)) {
                    $resultMin[$key1] += pow($solusiIdealMin - $dataNilaiTerbobot[$key1], 2);
                    $resultMax[$key1] += pow($solusiIdealMax - $dataNilaiTerbobot[$key1], 2);
                // }
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

            $result[$key] = $jarakNilaiIdeal['resultMin'][$key] / ($jarakNilaiIdeal['resultMin'][$key] + $jarakNilaiIdeal['resultMax'][$key]);
            $result[$key] = round($result[$key], 4);

        }
        return $result;
    }

}
