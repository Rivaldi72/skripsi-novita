<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\TopsisTrait;
use App\Model\User;

class InformasiController extends Controller
{
    use TopsisTrait;

    public function index()
    {
        $dataPelamar = User::where('jabatan', 'pelamar')->where('is_rated', true)->get();
        $dataNilai = self::nilaiPreferensi();

        $result = [];

        foreach ($dataPelamar as $key => $pelamar) {
            $result[$key]['nama'] = $pelamar->nama;
            $result[$key]['nilai'] = $dataNilai[$key];
        }

        usort($result, function ($a, $b) {
            if ($a['nilai'] == $b['nilai']) return 0;
            return $a['nilai'] < $b['nilai'] ? 1 : -1;
        });

        return view('pages.informasi.index', compact('result'));
    }
}
