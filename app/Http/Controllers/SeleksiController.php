<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Seleksi;
use App\Model\Kriteria;
use Auth;

class SeleksiController extends Controller
{
    public function index()
    {
        $dataSeleksiNilai = User::where('jabatan', 'pelamar')->with(['seleksiNilai'])->get();
        // dd($dataSeleksiNilai->toArray());
        return view('pages.seleksi.index', compact('dataSeleksiNilai'));
    }

    public function inputNilai($id)
    {
        $dataDetailNilai = Kriteria::with(['nilai'])->get();
        dd($dataDetailNilai->toArray());
        return view('pages.seleksi.input-nilai', compact('dataDetailNilai'));
    }

    public function simpanData(Request $request)
    {
        return redirect()->route('seleksi-index');
    }
}
