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
                <h2 class="content-header-title float-left mb-0">Detail Nilai Pelamar</h2>

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
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <fieldset class="form-group">
                                        <label for="usia">Usia (Benefit)</label>
                                        <input type="text" class="form-control" id="usia" placeholder="Nilai Usia" disabled>
                                    </fieldset>
                                </div>
                                <div class="col-12 col-md-2">
                                    <fieldset class="form-group">
                                        <label for="pendidikan">Pendidikan Terakhir (Benefit)</label>
                                        <input type="text" class="form-control" id="pendidikan" placeholder="Nilai Pendidikan Terakhir" disabled>
                                    </fieldset>
                                </div>
                                <div class="col-12 col-md-2">
                                    <fieldset class="form-group">
                                        <label for="ipk">IPK (Cost)</label>
                                        <input type="text" class="form-control" id="ipk" placeholder="Nilai IPK" disabled>
                                    </fieldset>
                                </div>
                                <div class="col-12 col-md-2">
                                    <fieldset class="form-group">
                                        <label for="bahasa">Kemampuan Bahasa Asing (Benefit)</label>
                                        <input type="text" class="form-control" id="bahasa" placeholder="Nilai Kemampuan Bahasa Asing" disabled>
                                    </fieldset>
                                </div>
                                <div class="col-12 col-md-3">
                                    <fieldset class="form-group">
                                        <label for="kerja">Pengalaman Kerja (Benefit)</label>
                                        <input type="text" class="form-control" id="kerja" placeholder="Nilai Pengalaman Kerja" disabled>
                                    </fieldset>
                                </div>
                                <div class="col-12 col-md-6">
                                    <fieldset class="form-group">
                                        <label for="wawancara">Wawancara (Benefit)</label>
                                        <input type="number" class="form-control" id="wawancara" placeholder="Masukkan Nilai Wawancara">
                                    </fieldset>
                                </div>
                                <div class="col-12 col-md-6">
                                    <fieldset class="form-group">
                                        <label for="psikotes">Psikotes (Benefit)</label>
                                        <input type="number" class="form-control" id="psikotes" placeholder="Masukkan Nilai Psikotes">
                                    </fieldset>
                                </div>
                                <div class="col-12 col-md-12">
                                    <button type="button" class="btn btn-relief-success btn-block waves-effect waves-light">Simpan</button>
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
