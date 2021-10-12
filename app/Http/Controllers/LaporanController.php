<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use Auth;
use App\Traits\TopsisTrait;

class LaporanController extends Controller
{
    use TopsisTrait;
    
    public function index()
    {
        $dataUser = User::where('jabatan', 'pelamar')->where('is_rated', true)->get();
        $dataNilaiAwal = self::nilaiPreferensi();
        $dataNilai = self::nilaiPreferensi();
        // dd('test');
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
