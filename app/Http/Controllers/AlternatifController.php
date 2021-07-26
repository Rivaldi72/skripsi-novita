<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Biodata;

class AlternatifController extends Controller
{
    public function index()
    {
        $dataAlternatif = User::where('jabatan', 'pelamar')->get();
        // dd($dataAlternatif->toArray());
        return view('pages.alternatif.index', compact('dataAlternatif'));
    }

    public function detail($id)
    {
        $biodata = Biodata::where('id_user', $id)->with(['pengalamanKerja', 'kemampuanBahasaAsing'])->first();
        // dd($biodata->toArray());
        return view('pages.alternatif.detail', compact('biodata'));
    }

    public function biodata()
    {
        return view('pages.alternatif.biodata');
    }

    public function biodataStore(Request $request)
    {
        dd($request->all());
    }
}
