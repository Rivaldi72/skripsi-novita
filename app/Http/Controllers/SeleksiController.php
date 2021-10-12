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
        // dd($dataSeleksiNilai[0]->seleksiNilai->toArray());
        return view('pages.seleksi.index', compact('dataSeleksiNilai'));
    }

    public function inputNilai($id)
    {
        $dataDetailNilai = Kriteria::whereHas('nilai', function($query) use($id){
            $query->where('id_user', $id);
        })
        ->with(['nilai' => function($query) use($id) {
            $query->where('id_user', $id);
            }
        ])
        ->get();
        
        $dataDetailNilaiKosong = Kriteria::whereDoesntHave('nilai', function($query) use($id){
            $query->where('id_user', $id);
        })->get();

        // dd($id, $dataDetailNilai->toArray(), $dataDetailNilaiKosong == null);
        return view('pages.seleksi.input-nilai', compact('dataDetailNilai', 'dataDetailNilaiKosong', 'id'));
    }

    public function inputNilaiStore(Request $request, $id)
    {
        $dataNilai = $request->all();
        $user = User::find($id);

        if (isset($dataNilai['idWawancara'])) {
            Seleksi::updateOrCreate(
                [
                    'id_user' => $id,
                    'id_kriteria' => $dataNilai['idWawancara'],
                    'nilai' => $dataNilai['nilaiWawancara'],
                ]
            );
        }

        if (isset($dataNilai['idPsikotest'])) {
            Seleksi::updateOrCreate(
                [
                    'id_user' => $id,
                    'id_kriteria' => $dataNilai['idPsikotest'],
                    'nilai' => $dataNilai['nilaiPsikotest'],
                ]
            );
        }

        $user->is_rated = true;
        $user->save();

        return redirect()->route('seleksi-input-nilai', $id);
    }
}
