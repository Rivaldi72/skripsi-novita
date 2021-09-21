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
        $dataPeringkat = [];

        return view('pages.laporan.index', compact('dataUser', 'dataNilaiAwal', 'dataNilai', 'dataNilaiSort'));
    }
}
