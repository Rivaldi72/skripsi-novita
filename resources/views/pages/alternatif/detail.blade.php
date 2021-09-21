@extends('layouts.app')

@section('custom_styles')

@endsection

@section('prepend_script')

@endsection

@section('append_script')

@endsection

@section('title')
    Alternatif
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Detail Data Pelamar</h2>

            </div>
        </div>
    </div>
    <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
        <div class="form-group breadcrum-right">

        </div>
    </div>
</div>

<div class="content-body">
    <!-- Zero configuration table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="row justify-content-between">
                                <div class="col-6">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Nama</label>
                                        <input type="text" class="form-control" id="" placeholder="{{ $biodata->nama ?? "Pelamar belum mengisi biodata" }}" disabled>
                                    </fieldset>
                                </div>
                                <div class="col-6">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Email</label>
                                        <input type="text" class="form-control" id="" placeholder="{{ $biodata->email ?? "Pelamar belum mengisi biodata" }}" disabled>
                                    </fieldset>
                                </div>
                                <div class="col-6">
                                    <fieldset class="form-group">
                                        <label for="basicInput">No.Handphone</label>
                                        <input type="text" class="form-control" id="" placeholder="{{ $biodata->no_hp ?? "Pelamar belum mengisi biodata" }}" disabled>
                                    </fieldset>
                                </div>
                                <div class="col-6">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Tanggal Lahir</label>
                                        <input type="text" class="form-control" id="" placeholder="{{ $biodata->tanggal_lahir ?? "Pelamar belum mengisi biodata" }}" disabled>
                                    </fieldset>
                                </div>
                                <div class="col-6">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="" placeholder="{{ $biodata->tempat_lahir ?? "Pelamar belum mengisi biodata" }}" disabled>
                                    </fieldset>
                                </div>
                                <div class="col-6">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Jenis Kelamin</label>
                                        <input type="text" class="form-control" id="" placeholder="{{ $biodata->jenis_kelamin ?? "Pelamar belum mengisi biodata" }}" disabled>
                                    </fieldset>
                                </div>
                                <div class="col-6">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Status</label>
                                        <input type="text" class="form-control" id="" placeholder="{{ $biodata->status ?? "Pelamar belum mengisi biodata" }}" disabled>
                                    </fieldset>
                                </div>
                                <div class="col-6">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Alamat</label>
                                        <input type="text" class="form-control" id="" placeholder="{{ $biodata->alamat ?? "Pelamar belum mengisi biodata" }}" disabled>
                                    </fieldset>
                                </div>
                                <div class="col-12">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Pendidikan Terakhir</label>
                                        <input type="text" class="form-control" id="" placeholder="{{ $biodata->pendidikan_terakhir ?? "Pelamar belum mengisi biodata" }}" disabled>
                                    </fieldset>
                                </div>
                                <div class="col-6">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Pengalaman Kerja</label>
                                        <div class="table-responsive" style="overflow-x: hidden;">
                                            <table id="datatable" class="table zero-configuration table-striped table-bordered text-center">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Perusahaan</th>
                                                        <th>Jabatan</th>
                                                        <th>Lama Kerja</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($biodata == null)
                                                        <tr>
                                                            <td colspan="4">Data Kosong</td>
                                                        </tr>
                                                    @else
                                                        @foreach ($biodata->pengalamanKerja as $number => $pengalaman_kerja)
                                                            <tr>
                                                                <td> {{ $number + 1 }} </td>
                                                                <td> {{ $pengalaman_kerja->perusahaan }} </td>
                                                                <td> {{ $pengalaman_kerja->jabatan }} </td>
                                                                <td> {{ $pengalaman_kerja->lama_kerja < 12 ? $pengalaman_kerja->lama_kerja : $pengalaman_kerja->lama_kerja / 12 }} {{ $pengalaman_kerja->lama_kerja < 12 ? 'Bulan' : 'Tahun' }}</td>
                                                            </tr>
                                                        @endforeach 
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-6">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Kemampuan Bahasa Asing</label>
                                        <div class="table-responsive" style="overflow-x: hidden;">
                                            <table id="datatable" class="table zero-configuration table-striped table-bordered text-center">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Bahasa</th>
                                                        <th>Read</th>
                                                        <th>Write</th>
                                                        <th>Speak</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($biodata == null)
                                                        <tr>
                                                            <td colspan="5">Data Kosong</td>
                                                        </tr>
                                                    @else
                                                        @foreach ($biodata->kemampuanBahasaAsing as $number => $kemampuan_bahasa_asing)
                                                            <tr>
                                                                <td> {{ $number + 1 }} </td>
                                                                <td> {{ $kemampuan_bahasa_asing->bahasa }} </td>
                                                                <td> {{ $kemampuan_bahasa_asing->read == true ? 'Lancar' : 'Tidak Lancar' }} </td>
                                                                <td> {{ $kemampuan_bahasa_asing->write == true ? 'Lancar' : 'Tidak Lancar' }} </td>
                                                                <td> {{ $kemampuan_bahasa_asing->speak == true ? 'Lancar' : 'Tidak Lancar' }} </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-6">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Jurusan Pendidikan</label>
                                        <input type="text" class="form-control" id="" placeholder="{{ $biodata->jurusan_pendidikan ?? "Pelamar belum mengisi biodata" }}" disabled>
                                    </fieldset>
                                </div>
                                <div class="col-6">
                                    <fieldset class="form-group">
                                        <label for="basicInput">IPK</label>
                                        <input type="text" class="form-control" id="" placeholder="{{ $biodata->ipk ?? "Pelamar belum mengisi biodata" }}" disabled>
                                    </fieldset>
                                </div>
                                
                                <div class="col-2">
                                    <label for="basicInputFile">KTP</label>
                                    <img src="{{ Storage::disk('user_file')->exists($biodata->ktp) ? asset('storage/user-file/'.$biodata->ktp) : url('user-image/no-image.png') }}" class="img-fluid mb-1 rounded-sm" data-toggle="modal" data-target="#ktp-modal" alt="" style="width: 100%; height: 70%; object-fit: cover; cursor: pointer">
                                </div>
                                <div class="col-2">
                                    <label for="basicInputFile">Pas Foto</label>
                                    <img src="{{ Storage::disk('user_file')->exists($biodata->pas_poto) ? asset('storage/user-file/'.$biodata->pas_poto) : url('user-image/no-image.png') }}" class="img-fluid mb-1 rounded-sm" data-toggle="modal" data-target="#pas-foto-modal" alt="" style="width: 100%; height: 70%; object-fit: cover; cursor: pointer">
                                </div>
                                <div class="col-2">
                                    <label for="basicInputFile">Ijazah</label>
                                    <img src="{{ Storage::disk('user_file')->exists($biodata->ijazah) ? asset('storage/user-file/'.$biodata->ijazah) : url('user-image/no-image.png') }}" class="img-fluid mb-1 rounded-sm" data-toggle="modal" data-target="#ijazah-modal" alt="" style="width: 100%; height: 70%; object-fit: cover; cursor: pointer">
                                </div>
                                <div class="col-2">
                                    <label for="basicInputFile">Transkrip Nilai</label>
                                    <img src="{{ Storage::disk('user_file')->exists($biodata->transkrip_nilai) ? asset('storage/user-file/'.$biodata->transkrip_nilai) : url('user-image/no-image.png') }}" class="img-fluid mb-1 rounded-sm" data-toggle="modal" data-target="#nilai-modal" alt="" style="width: 100%; height: 70%; object-fit: cover; cursor: pointer">
                                </div>
                                <div class="col-2">
                                    <label for="basicInputFile">Portofolio</label>
                                    <img src="{{ Storage::disk('user_file')->exists($biodata->portofolio) ? asset('storage/user-file/'.$biodata->portofolio) : url('user-image/no-image.png') }}" class="img-fluid mb-1 rounded-sm" data-toggle="modal" data-target="#portofolio-modal" alt="" style="width: 100%; height: 70%; object-fit: cover; cursor: pointer">
                                </div>

                                <div class="modal fade text-left show" id="ktp-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-modal="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel1">KTP</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ Storage::disk('user_file')->exists($biodata->ktp) ? asset('storage/user-file/'.$biodata->ktp) : url('user-image/no-image.png') }}" class="img-fluid mb-1 rounded-sm" style="width: 100%; height: 95%; object-fit: cover;">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning waves-effect waves-light" data-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade text-left show" id="pas-foto-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-modal="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel1">Pas Foto</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ Storage::disk('user_file')->exists($biodata->pas_poto) ? asset('storage/user-file/'.$biodata->pas_poto) : url('user-image/no-image.png') }}" class="img-fluid mb-1 rounded-sm" style="width: 100%; height: 95%; object-fit: cover;">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning waves-effect waves-light" data-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade text-left show" id="ijazah-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-modal="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel1">Ijazah</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ Storage::disk('user_file')->exists($biodata->ijazah) ? asset('storage/user-file/'.$biodata->ijazah) : url('user-image/no-image.png') }}" class="img-fluid mb-1 rounded-sm" style="width: 100%; height: 95%; object-fit: cover;">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning waves-effect waves-light" data-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade text-left show" id="nilai-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-modal="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel1">Transkrip Nilai</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ Storage::disk('user_file')->exists($biodata->transkrip_nilai) ? asset('storage/user-file/'.$biodata->transkrip_nilai) : url('user-image/no-image.png') }}" class="img-fluid mb-1 rounded-sm" style="width: 100%; height: 95%; object-fit: cover;">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning waves-effect waves-light" data-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade text-left show" id="portofolio-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-modal="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel1">Portofolio</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ Storage::disk('user_file')->exists($biodata->portofolio) ? asset('storage/user-file/'.$biodata->portofolio) : url('user-image/no-image.png') }}" class="img-fluid mb-1 rounded-sm" style="width: 100%; height: 95%; object-fit: cover;">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning waves-effect waves-light" data-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--/ Zero configuration table -->
</div>
@endsection
