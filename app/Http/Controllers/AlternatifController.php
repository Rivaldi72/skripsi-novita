<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Biodata;
use Auth;
use Str;
use Carbon\Carbon;
use App\Http\Requests\BiodataRequest;

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
        $biodata = Biodata::where('id_user', Auth::user()->id_user)->first();
        return view('pages.alternatif.biodata', compact('biodata'));
    }

    public function biodataStore(BiodataRequest $request)
    {
        // dd($request->all());

        $birtDate = $request->tanggal_lahir;
        $formatedBirtDate = Carbon::parse($birtDate)->format('Y-m-d');
        $dataFile = [
            'ktp' => null,
            'pas_poto' => null,
            'ijazah' => null,
            'transkrip_nilai' => null,
            'portofolio' => null,
        ];
        $files = $request->file('file');
        
        if ($files != null) {
            foreach ($files as $key => $data) {
                $getFileExt = $data->getClientOriginalExtension();
                $fileName =  $key.'-'.Str::uuid().'.'.$getFileExt;
                $data->storeAs('public/user-file', $fileName);
                $dataFile[$key] = $fileName;
            }
        }
        
        
        $biodata = Biodata::where('id_user', Auth::user()->id_user)->first();

        $data = Biodata::updateOrCreate(
            [
                'id_user' => Auth::user()->id_user,
            ],
            [
                'nama' => $request->nama ?? $biodata->nama,
                'tanggal_lahir' => $formatedBirtDate ?? $biodata->tanggal_lahir,
                'tempat_lahir' => $request->tempat_lahir ?? $biodata->tempat_lahir,
                'jenis_kelamin' => $request->jenis_kelamin ?? $biodata->jenis_kelamin,
                'status' => $request->status ?? $biodata->status,
                'alamat' => $request->alamat ?? $biodata->alamat,
                'email' => $request->email ?? $biodata->email,
                'no_hp' => $request->no_hp ?? $biodata->no_hp,
                'pendidikan_terakhir' => $request->pendidikan_terakhir ?? $biodata->pendidikan_terakhir,
                'jurusan_pendidikan' => $request->jurusan_pendidikan ?? $biodata->jurusan_pendidikan,
                'ipk' => $request->ipk ?? $biodata->ipk,
                'ktp' => !is_null($dataFile['ktp']) ? $dataFile['ktp'] : $biodata->ktp,
                'pas_poto' => !is_null($dataFile['pas_poto']) ? $dataFile['pas_poto'] : $biodata->pas_poto,
                'ijazah' => !is_null($dataFile['ijazah']) ? $dataFile['ijazah'] : $biodata->ijazah,
                'transkrip_nilai' => !is_null($dataFile['transkrip_nilai']) ? $dataFile['transkrip_nilai'] : $biodata->transkrip_nilai,
                'portofolio' => !is_null($dataFile['portofolio']) ? $dataFile['portofolio'] : $biodata->portofolio,
            ]
        );

        return redirect()->route('alternatif-biodata');
    }
}
