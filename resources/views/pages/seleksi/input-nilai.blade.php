@extends('layouts.app')

@section('custom_styles')

@endsection

@section('prepend_script')

@endsection

@section('append_script')

@endsection

@section('title')
    Detail Nilai Seleksi
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
                                <div class="col-12">
                                    <form action="{{ route('input-nilai-store', $id) }}" method="POST" id="dataForm">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row justify-content-between">
                                                    @foreach ($dataDetailNilai as $key => $item)
                                                        <div class="col-12 col-md-4">
                                                            <fieldset class="form-group">
                                                                <label for="{{ $item->id_kriteria }}" class="text-capitalize">{{ $item->kriteria }} ({{ $item->jenis }})</label>
                                                                <input type="text" class="form-control" name="{{ $item->id_kriteria }}" placeholder="Nilai {{ $item->kriteria }}" disabled value="{{ $item->nilai[0]->nilai }}">
                                                            </fieldset>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row justify-content-between">
                                                    @foreach ($dataDetailNilaiKosong as $key => $item)
                                                        <div class="col-12 col-md">
                                                            <fieldset class="form-group">
                                                                <label for="{{ $item->id_kriteria }}" class="text-capitalize">{{ $item->kriteria }} ({{ $item->jenis }})</label>
                                                                <input type="hidden" name="id{{ str_replace(" ", "", $item->kriteria) }}" value="{{ $item->id_kriteria }}">
                                                                <input type="number" class="form-control" name="nilai{{ str_replace(" ", "", $item->kriteria) }}" placeholder="Masukkan Nilai {{ $item->kriteria }}" value="">
                                                            </fieldset>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        @if ($dataDetailNilaiKosong->count() != 0)
                                            <div class="row">
                                                <div class="col-12 col-md-12">
                                                    <button type="submit" class="btn btn-relief-success btn-block waves-effect waves-light">Simpan</button>
                                                </div>   
                                            </div>
                                        @endif
                                    </form>
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
