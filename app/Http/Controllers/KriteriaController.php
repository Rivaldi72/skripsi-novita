<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Kriteria;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::all();
        return view('pages.kriteria.index', compact('kriteria'));
    }

    public function detail()
    {
        
    }
}
