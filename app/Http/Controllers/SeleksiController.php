<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeleksiController extends Controller
{
    public function index()
    {
        return view('pages.seleksi.index');
    }

    public function inputNilai($id)
    {
        return view('pages.seleksi.input-nilai');
    }

    public function simpanData(Request $request)
    {
        return redirect()->route('seleksi-index');
    }
}
