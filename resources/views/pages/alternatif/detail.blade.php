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
                <h2 class="content-header-title float-left mb-0">Home</h2>

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
                                        <input type="text" class="form-control" id="" placeholder="{{ $biodata->nama }}" disabled>
                                    </fieldset>
                                </div>
                                <div class="col-6">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Email</label>
                                        <input type="text" class="form-control" id="" placeholder="{{ $biodata->email }}" disabled>
                                    </fieldset>
                                </div>
                                <div class="col-6">
                                    <fieldset class="form-group">
                                        <label for="basicInput">No.Handphone</label>
                                        <input type="text" class="form-control" id="" placeholder="{{ $biodata->no_hp }}" disabled>
                                    </fieldset>
                                </div>
                                <div class="col-6">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Tanggal Lahir</label>
                                        <input type="text" class="form-control" id="" placeholder="{{ $biodata->tanggal_lahir }}" disabled>
                                    </fieldset>
                                </div>
                                <div class="col-6">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="" placeholder="{{ $biodata->tempat_lahir }}" disabled>
                                    </fieldset>
                                </div>
                                <div class="col-6">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Jenis Kelamin</label>
                                        <input type="text" class="form-control" id="" placeholder="{{ $biodata->jenis_kelamin }}" disabled>
                                    </fieldset>
                                </div>
                                <div class="col-6">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Status</label>
                                        <input type="text" class="form-control" id="" placeholder="{{ $biodata->status }}" disabled>
                                    </fieldset>
                                </div>
                                <div class="col-6">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Alamat</label>
                                        <input type="text" class="form-control" id="" placeholder="{{ $biodata->alamat }}" disabled>
                                    </fieldset>
                                </div>
                                <div class="col-12">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Pendidikan Terakhir</label>
                                        <input type="text" class="form-control" id="" placeholder="{{ $biodata->pendidikan_terakhir }}" disabled>
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
                                                    @foreach ($biodata->pengalamanKerja as $number => $pengalaman_kerja)
                                                        <tr>
                                                            <td> {{ $number + 1 }} </td>
                                                            <td> {{ $pengalaman_kerja->perusahaan }} </td>
                                                            <td> {{ $pengalaman_kerja->jabatan }} </td>
                                                            <td> {{ $pengalaman_kerja->lama_kerja < 12 ? $pengalaman_kerja->lama_kerja : $pengalaman_kerja->lama_kerja / 12 }} {{ $pengalaman_kerja->lama_kerja < 12 ? 'Bulan' : 'Tahun' }}</td>
                                                        </tr>
                                                    @endforeach
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
                                                    @foreach ($biodata->kemampuanBahasaAsing as $number => $kemampuan_bahasa_asing)
                                                        <tr>
                                                            <td> {{ $number + 1 }} </td>
                                                            <td> {{ $kemampuan_bahasa_asing->bahasa }} </td>
                                                            <td> {{ $kemampuan_bahasa_asing->read == true ? 'Lancar' : 'Tidak Lancar' }} </td>
                                                            <td> {{ $kemampuan_bahasa_asing->write == true ? 'Lancar' : 'Tidak Lancar' }} </td>
                                                            <td> {{ $kemampuan_bahasa_asing->speak == true ? 'Lancar' : 'Tidak Lancar' }} </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-6">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Jurusan Pendidikan</label>
                                        <input type="text" class="form-control" id="" placeholder="{{ $biodata->jurusan_pendidikan }}" disabled>
                                    </fieldset>
                                </div>
                                <div class="col-6">
                                    <fieldset class="form-group">
                                        <label for="basicInput">IPK</label>
                                        <input type="text" class="form-control" id="" placeholder="{{ $biodata->ipk }}" disabled>
                                    </fieldset>
                                </div>
                                <div class="col-2">
                                    <label for="basicInputFile">KTP</label>
                                    <img src="{{ url('user-image') }}/{{ $biodata->ktp }}" class="img-fluid mb-1 rounded-sm" data-toggle="modal" data-target="#ktp-modal" alt="" style="width: 100%; height: 70%; object-fit: cover; cursor: pointer">
                                </div>
                                <div class="col-2">
                                    <label for="basicInputFile">Pas Foto</label>
                                    <img src="{{ url('user-image') }}/{{ $biodata->pas_poto }}" class="img-fluid mb-1 rounded-sm" data-toggle="modal" data-target="#pas-foto-modal" alt="" style="width: 100%; height: 70%; object-fit: cover; cursor: pointer">
                                </div>
                                <div class="col-2">
                                    <label for="basicInputFile">Ijazah</label>
                                    <img src="{{ url('user-image') }}/{{ $biodata->ijazah }}" class="img-fluid mb-1 rounded-sm" data-toggle="modal" data-target="#ijazah-modal" alt="" style="width: 100%; height: 70%; object-fit: cover; cursor: pointer">
                                </div>
                                <div class="col-2">
                                    <label for="basicInputFile">Transkrip Nilai</label>
                                    <img src="{{ url('user-image') }}/{{ $biodata->transkrip_nilai }}" class="img-fluid mb-1 rounded-sm" data-toggle="modal" data-target="#nilai-modal" alt="" style="width: 100%; height: 70%; object-fit: cover; cursor: pointer">
                                </div>
                                <div class="col-2">
                                    <label for="basicInputFile">Portofolio</label>
                                    <img src="{{ url('user-image') }}/{{ $biodata->portofolio }}" class="img-fluid mb-1 rounded-sm" data-toggle="modal" data-target="#portofolio-modal" alt="" style="width: 100%; height: 70%; object-fit: cover; cursor: pointer">
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
                                                <img src="{{ url('user-image') }}/{{ $biodata->ktp }}" class="img-fluid mb-1 rounded-sm" style="width: 100%; height: 95%; object-fit: cover;">
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
                                                <img src="{{ url('user-image') }}/{{ $biodata->pas_poto }}" class="img-fluid mb-1 rounded-sm" style="width: 100%; height: 95%; object-fit: cover;">
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
                                                <img src="{{ url('user-image') }}/{{ $biodata->ijazah }}" class="img-fluid mb-1 rounded-sm" style="width: 100%; height: 95%; object-fit: cover;">
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
                                                <img src="{{ url('user-image') }}/{{ $biodata->transkrip_nilai }}" class="img-fluid mb-1 rounded-sm" style="width: 100%; height: 95%; object-fit: cover;">
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
                                                <img src="{{ url('user-image') }}/{{ $biodata->portofolio }}" class="img-fluid mb-1 rounded-sm" style="width: 100%; height: 95%; object-fit: cover;">
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
