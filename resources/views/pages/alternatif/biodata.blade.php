@extends('layouts.app')

@section('custom_styles')
    <link rel="stylesheet" type="text/css" href="{{ url("app-assets/vendors/css/pickers/pickadate/pickadate.css") }}">
@endsection

@section('prepend_script')

@endsection

@section('append_script')

    <script src="{{ URL::asset('app-assets/vendors/js/pickers/pickadate/picker.js') }}"></script>
    <script src="{{ URL::asset('app-assets/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
    <script src="{{ URL::asset('app-assets/vendors/js/pickers/pickadate/picker.time.js') }}"></script>
    <script src="{{ URL::asset('app-assets/vendors/js/pickers/pickadate/legacy.js') }}"></script>
    <script src="{{ URL::asset('app-assets/js/scripts/pickers/dateTime/pick-a-datetime.js') }}"></script>

@endsection

@section('title')
    Alternatif
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">ISI DATA DIRI ANDA</h2>

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
                            <form action="{{ route('alternatif-biodata-store') }}" method="POST" id="dataForm">
                                {{ csrf_field() }}
                                {{ method_field('POST') }}
                                <div class="row">
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Nama</label>
                                            <input type="text" name="nama" class="form-control" id="" placeholder="Nama">
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Email</label>
                                            <input type="text" name="email" class="form-control" id="" placeholder="Email">
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label for="basicInput">No.Handphone</label>
                                            <input type="text" name="no_hp" class="form-control" id="" placeholder="No.Handphone">
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Tanggal Lahir</label>
                                            <form action="">
                                                <input type='text' name="tanggal_lahir" class="form-control pickadate" id="" placeholder="Data Of Birth" />
                                            </form>
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir" class="form-control" id="" placeholder="Place Of Birth">
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Jenis Kelamin</label>
                                            <select class="custom-select" name="jenis_kelamin" id="customSelect">
                                                <option selected="" value="">Pilih jenis kelamin</option>
                                                <option value="L">Laki-laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Status</label>
                                            <select class="custom-select" name="status" id="customSelect">
                                                <option selected="">Pilih status</option>
                                                <option value="Belum Menikah">Belum Menikah</option>
                                                <option value="Menikah">Menikah</option>
                                                <option value="Janda / Duda">Janda / Duda</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Alamat</label>
                                            <input type="text" name="alamat" class="form-control" id="" placeholder="Masukkan Alamat">
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Pendidikan Terakhir</label>
                                            <select class="custom-select" name="pendidikan_terakhir" id="customSelect">
                                                <option selected="">Pilih pendidikan terakhir</option>
                                                <option value="SD">Sekolah Dasar (Setara)</option>
                                                <option value="SMP">Sekolah Menengah Pertama (Setara)</option>
                                                <option value="SMA">Sekolah Menengah Atas (Setara)</option>
                                                <option value="S1">Strata-I (Setara)</option>
                                                <option value="S2">Strata-II (Setara)</option>
                                                <option value="S3">Strata-III (Setara)</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Pengalaman Kerja</label>
                                            <input type="text" class="form-control" name="pengalaman_kerja" id="" placeholder="Masukkan Pengalaman Kerja">
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Jurusan Pendidikan</label>
                                            <input type="text" class="form-control" name="jurusan_pendidikan" id="" placeholder="Masukkan Jurusan Anda">
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label for="basicInput">IPK</label>
                                            <input type="text" class="form-control" name="ipk" id="" placeholder="Masukkan IPK">
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Kemampuan Bahasa Asing</label>
                                            <input type="text" class="form-control" name="kemampuan_bahasa_asing" id="" placeholder="Masukkan Bahasa Yang Dikuasai">
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label for="basicInputFile">KTP</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="ktp" id="inputGroupFile01">
                                                <label class="custom-file-label" for="inputGroupFile01">Upload File KTP</label>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label for="basicInputFile">Pas Photo</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="pas_poto" id="inputGroupFile01">
                                                <label class="custom-file-label" for="inputGroupFile01">Upload Pas Foto</label>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label for="basicInputFile">Ijazah</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="ijazah" id="inputGroupFile01">
                                                <label class="custom-file-label" for="inputGroupFile01">Upload Ijazah</label>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label for="basicInputFile">Transkip Nilai</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="transkrip_nilai" id="inputGroupFile01">
                                                <label class="custom-file-label" for="inputGroupFile01">Upload Transkip Nilai</label>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label for="basicInputFile">Portofolio</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="portofolio" id="inputGroupFile01">
                                                <label class="custom-file-label" for="inputGroupFile01">Upload Portofolio</label>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success waves-effect waves-light">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--/ Zero configuration table -->
</div>
@endsection
