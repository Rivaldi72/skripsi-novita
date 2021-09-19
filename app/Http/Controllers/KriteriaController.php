<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Kriteria;

class KriteriaController extends Controller
{
    public function index()
    {
        // dd([
        //     'pembobotanKriteria' => self::pembobotanKriteria(),
        //     'normalisasiBobot' => self::normalisasiBobot(),
        //     'avarageBobot' => self::avarageBobot(),
        //     'matriksKonsistensi' => self::matriksKonsistensi(),
        //     'konsistensiVektor' => self::konsistensiVektor(),
        //     'maxVektor' => self::maxVektor(),
        //     'indexKonsistensi' => self::indexKonsistensi(),
        //     'rasioKonsistensi' => self::rasioKonsistensi(),
        // ]);
        $dataKriteria = Kriteria::all();
        $bobot = self::avarageBobot();

        foreach ($bobot as $key => $value) {
            $kriteria = Kriteria::find($key + 1);
            // dd($kriteria->toArray());
            $kriteria->bobot = $bobot[$key];
            $kriteria->save();
        }

        return view('pages.kriteria.index', compact('dataKriteria', 'bobot'));
    }

    public function detail()
    {
        
    }

    public function pembobotanKriteria()
    {
        $kriteria = Kriteria::all()->toArray();
        $result = [];
        $total = [];
        foreach ($kriteria as $key1 => $value1) {
            foreach ($kriteria as $key2 => $value2) {
                $result[$key2][$key1] = round($value1['kepentingan'] / $value2['kepentingan'], 4);
            }
        }
        foreach ($result as $key3 => $value3) {
            $result[$key3]['total'] = round(array_sum($value3), 4);
        }
        return $result;
    }

    public function normalisasiBobot()
    {
        $data = self::pembobotanKriteria();
        $result = [];

        foreach ($data as $key1 => $value1) {
            foreach ($value1 as $key2 => $value2) {
                if ($key2 < count($value1)) {
                    $result[$key2][$key1] = $value2 / $value1['total'];
                    $result[$key2][$key1] = round($result[$key2][$key1], 4);
                }
            }
            unset($result['total']);
        }
        return $result;
    }

    public function avarageBobot()
    {
        $data = self::normalisasiBobot();
        $result = [];

        foreach ($data as $key1 => $value1) {
            $result[$key1] = round(array_sum($value1), 4) / count($data);
        }
        return $result;
    }

    public function matriksKonsistensi()
    {
        $pembobotanKriteria = self::pembobotanKriteria();
        $avarageBobot = self::avarageBobot();
        $result = [];

        foreach ($pembobotanKriteria as $key1 => $value1) {
            foreach ($value1 as $key2 => $value2) {
                $result[$key2][$key1] = round($value2 * $avarageBobot[$key1], 4);
            }
            unset($result['total']);
        }

        foreach ($result as $key3 => $value3) {
            $result['total'][$key3] = round(array_sum($value3), 4);
        }

        return $result;
    }

    public function konsistensiVektor()
    {
        $matriksKonsistensi = self::matriksKonsistensi();
        $avarageBobot = self::avarageBobot();
        $result = [];

        foreach ($matriksKonsistensi['total'] as $key => $value) {
            // echo $value . '<br>';
            $result[$key] = round($value / $avarageBobot[$key], 4);
        }

        $result['total'] = round(array_sum($result), 4);

        return $result;
    }

    public function maxVektor()
    {
        $konsistensiVektor = self::konsistensiVektor();
        $jumlahKriteria = Kriteria::count();
        $result = round($konsistensiVektor['total'] / $jumlahKriteria, 4);

        return $result;
    }

    public function indexKonsistensi()
    {
        $maxVektor = self::maxVektor();
        $jumlahKriteria = Kriteria::count();

        $result = round(($maxVektor - $jumlahKriteria) / ($jumlahKriteria - 1), 4);

        return $result;
    }

    public function rasioKonsistensi()
    {
        $indexKonsistensi = self::indexKonsistensi();
        $result = [];

        $result['nilai'] = round($indexKonsistensi / 1.32, 4);
        // echo $result * 100;
        $result['persen'] = ($result['nilai'] * 100) . '%';
        return $result;
    }
}
