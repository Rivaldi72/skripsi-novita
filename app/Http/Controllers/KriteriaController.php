<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Kriteria;
use App\Traits\AhpTrait;

class KriteriaController extends Controller
{
    use AhpTrait;
    public function index()
    {
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
}
