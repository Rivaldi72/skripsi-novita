<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Biodata;
use App\Model\Seleksi;
use App\Model\PengalamanKerja;
use App\Model\KemampuanBahasaAsing;
use Auth;
use Str;
use Carbon\Carbon;
use App\Http\Requests\BiodataRequest;

class AlternatifController extends Controller
{
    public function index()
    {
        $dataAlternatif = User::where('jabatan', 'pelamar')->get();
        return view('pages.alternatif.index', compact('dataAlternatif'));
    }

    public function detail($id)
    {
        $biodata = Biodata::where('id_user', $id)->with(['pengalamanKerja', 'kemampuanBahasaAsing'])->first();
        return view('pages.alternatif.detail', compact('biodata'));
    }

    public function biodata()
    {
        $biodata = Biodata::where('id_user', Auth::user()->id_user)->with(['pengalamanKerja', 'kemampuanBahasaAsing'])->first();
        return view('pages.alternatif.biodata', compact('biodata'));
    }

    public function biodataStore(BiodataRequest $request)
    {
        $pengalamanKerja = json_decode($request->pengalaman_kerja);
        $kemampuanBahasaAsing = json_decode($request->kemampuan_bahasa_asing);

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
                $fileName =  $key . '-' . Str::uuid() . '.' . $getFileExt;
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

        if ($pengalamanKerja !== null) {
            foreach ($pengalamanKerja as $dataItemPengalamanKerja) {
                PengalamanKerja::updateOrCreate(
                    [
                        'id_user' => Auth::user()->id_user,
                        'perusahaan' => $dataItemPengalamanKerja->perusahaan,
                        'jabatan' => $dataItemPengalamanKerja->jabatan,
                        'lama_kerja' => $dataItemPengalamanKerja->lamaKerja,
                    ]
                );
            };
        }

        if ($kemampuanBahasaAsing !== null) {
            foreach ($kemampuanBahasaAsing as $dataKemampuanBahasaAsing) {
                KemampuanBahasaAsing::updateOrCreate(
                    [
                        'id_user' => Auth::user()->id_user,
                        'bahasa' => $dataKemampuanBahasaAsing->bahasa,
                        'read' => $dataKemampuanBahasaAsing->read,
                        'write' => $dataKemampuanBahasaAsing->write,
                        'speak' => $dataKemampuanBahasaAsing->speak,
                    ]
                );
            };
        }

        return $this->biodataNilai();
    }

    public function biodataNilai()
    {
        $biodata = Biodata::where('id_user', Auth::user()->id_user)->with(['pengalamanKerja', 'kemampuanBahasaAsing'])->first();

        // Mengambil Detail Umur
        // \Carbon\Carbon::parse($user->birth)->diff(\Carbon\Carbon::now())->format('%y Tahun, %m bulan dan %d hari');

        if ($biodata != null) {
            $umur = \Carbon\Carbon::parse($biodata->tanggal_lahir)->diff(\Carbon\Carbon::now())->format('%y');
            $pendidikanTerakhir = $biodata->pendidikan_terakhir;
            $ipk = $biodata->ipk;
            $kemampuanBahasaAsing = $biodata->kemampuanBahasaAsing;
            $pengalamanKerja = $biodata->pengalamanKerja->sum('lama_kerja');

            if ($umur >= 19 and $umur <= 24) {
                $nilaiUmur = 5;
            } elseif ($umur >= 25 and $umur <= 30) {
                $nilaiUmur = 4;
            } elseif ($umur >= 30 and $umur <= 35) {
                $nilaiUmur = 3;
            } else {
                $nilaiUmur = 0;
            }

            if ($pendidikanTerakhir == 'S1' or $pendidikanTerakhir == 'S2' or $pendidikanTerakhir == 'S3') {
                $nilaiPendidikanTerakhir = 5;
            } elseif ($pendidikanTerakhir == 'D3') {
                $nilaiPendidikanTerakhir = 3;
            } elseif ($pendidikanTerakhir == 'SMA') {
                $nilaiPendidikanTerakhir = 2;
            } else {
                $nilaiPendidikanTerakhir = 0;
            }

            if ($ipk >= 3.51 and $ipk <= 4.00) {
                $nilaiIpk = 5;
            } elseif ($ipk >= 2.76 and $ipk <= 3.50) {
                $nilaiIpk = 3;
            } elseif ($ipk >= 2.00 and $ipk <= 2.75) {
                $nilaiIpk = 2;
            } else {
                $nilaiIpk = 0;
            }

            $nilaiKemampuanBahasaAsing = 0;
            if ($kemampuanBahasaAsing->count() != 0) {
                foreach ($kemampuanBahasaAsing as $key => $value) {
                    if ($value->bahasa == 'Arab') {
                        $nilaiKemampuanBahasaAsing += 4;
                    } elseif ($value->bahasa == 'Inggris') {
                        $nilaiKemampuanBahasaAsing += 3;
                    } else {
                        $nilaiKemampuanBahasaAsing += 0;
                    }
                }
            }

            if ($pengalamanKerja <= 12) {
                $nilaiPengalamanKerja = 3;
            } elseif ($pengalamanKerja > 12) {
                $nilaiPengalamanKerja = 4;
            } else {
                $nilaiPengalamanKerja = 0;
            }

            Seleksi::updateOrCreate(
                [
                    'id_user' => Auth::user()->id_user,
                    'id_kriteria' => 1,
                ],
                [
                    'nilai' => $nilaiPendidikanTerakhir,
                ]
            );

            Seleksi::updateOrCreate(
                [
                    'id_user' => Auth::user()->id_user,
                    'id_kriteria' => 2,
                ],
                [
                    'nilai' => $nilaiUmur,
                ]
            );

            Seleksi::updateOrCreate(
                [
                    'id_user' => Auth::user()->id_user,
                    'id_kriteria' => 3,
                ],
                [
                    'nilai' => $nilaiIpk,
                ]
            );

            Seleksi::updateOrCreate(
                [
                    'id_user' => Auth::user()->id_user,
                    'id_kriteria' => 4,
                ],
                [
                    'nilai' => $nilaiKemampuanBahasaAsing,
                ]
            );

            Seleksi::updateOrCreate(
                [
                    'id_user' => Auth::user()->id_user,
                    'id_kriteria' => 6,
                ],
                [
                    'nilai' => $nilaiPengalamanKerja,
                ]
            );
        }
        // dd(Auth::user()->id_user, $umur, $nilaiUmur, $pendidikanTerakhir, $nilaiPendidikanTerakhir, $ipk, $nilaiIpk, $kemampuanBahasaAsing->toArray(), $nilaiKemampuanBahasaAsing, $pengalamanKerja, $nilaiPengalamanKerja, $biodata->toArray());

        return redirect()->route('alternatif-biodata');
    }
}
