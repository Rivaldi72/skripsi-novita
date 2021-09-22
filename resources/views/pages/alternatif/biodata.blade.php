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

    <script>
        var picker = $('.tanggal_lahir').pickadate({
            onStart: function() {
                var date = new Date('{{ $biodata->tanggal_lahir ?? \Carbon\Carbon::now()}}');
                console.log(this)
                this.set('select',  date );
            },
            selectYears: 100,
            selectMonths: true
        });
    </script>

    <script>
        var itemsPengalamanKerja = [];
        var itemsKemampuanBahasaAsing = [];
        var indexItemPengalamanKerja = 0;
        var indexKemampuanBahasaAsing = 0;

        function addListPengalamanKerja(){
            perusahaan = $("#perusahaan").val();
            jabatan = $("#jabatan").val();
            lamaKerja = $("#lama_kerja").val();

            if(perusahaan == '' || jabatan == '' || lamaKerja == '') {
                return alert('Isi semua data terlebih dahulu')
            }

            indexItemPengalamanKerja = indexItemPengalamanKerja + 1;
            idItem = 'pengalamanKerja' + indexItemPengalamanKerja;

            itemsPengalamanKerja.push({idItem: idItem, perusahaan: perusahaan, jabatan: jabatan, lamaKerja: lamaKerja});

            $( "#perusahaan" ).val('');
            $( "#jabatan" ).val('');
            $( "#lama_kerja" ).val('');

            $( "#dummy_data_pengalaman_kerja" ).remove();
            $( "#list_pengalaman_kerja" ).append( `
                <tr id="${idItem}">
                    <td>${indexItemPengalamanKerja}</td>
                    <td>${perusahaan}</td>
                    <td>${jabatan}</td>
                    <td>${lamaKerja}</td>
                    <td><button type="button" onClick="removeListPengalamanKerja('${idItem}');" class="btn btn-icon btn-danger btn-relief-danger rounded-circle mb-1 waves-effect waves-light"><i class="feather icon-x"></i></button></td>
                </tr>
            ` );

            $( "#perusahaan" ).focus();
            var listItemPengalamanKerja = JSON.stringify(itemsPengalamanKerja);
            $( "#pengalamanKerja" ).val(listItemPengalamanKerja);

            console.table(itemsPengalamanKerja);
            return false;
        }

        function addListKemampuanBahasaAsing(){
            bahasa = $("#bahasa").val();
            read = $("#read").val();
            write = $("#write").val();
            speak = $("#speak").val();

            if(bahasa == '' || read == '' || write == '' || speak == '') {
                return alert('Isi semua data terlebih dahulu')
            }

            indexKemampuanBahasaAsing = indexKemampuanBahasaAsing + 1;
            idItem = 'kemampuanBahasaAsing' + indexKemampuanBahasaAsing;

            itemsKemampuanBahasaAsing.push({idItem: idItem, bahasa: bahasa, read: read, write: write, speak: speak});

            $( "#bahasa" ).val('');
            $( "#read option[value=0]").attr("selected","selected");
            $( "#write option[value=0]").attr("selected","selected");
            $( "#speak option[value=0]").attr("selected","selected");

            $( "#dummy_data_kemampuan_bahasa_asing" ).remove();
            $( "#list_kemampuan_bahasa_asing" ).append( `
                <tr id="${idItem}">
                    <td>${indexKemampuanBahasaAsing}</td>
                    <td>${bahasa}</td>
                    <td>${read}</td>
                    <td>${write}</td>
                    <td>${speak}</td>
                    <td><button type="button" onClick="removeListKemampuanBahasaAsing('${idItem}');" class="btn btn-icon btn-danger btn-relief-danger rounded-circle mb-1 waves-effect waves-light"><i class="feather icon-x"></i></button></td>
                </tr>
            ` );

            $( "#bahasa" ).focus();
            var listItemKemampuanBahasaAsing = JSON.stringify(itemsKemampuanBahasaAsing);
            $( "#kemampuanBahasaAsing" ).val(listItemKemampuanBahasaAsing);

            console.table(itemsKemampuanBahasaAsing);
            return false;
        }

        function removeListPengalamanKerja(id){
            // console.log(id);
            var idItem = id.substr(id.length - 1);
            // console.log(idItem);

            $( "#" + id ).remove();

            const deleteIndex = itemsPengalamanKerja.findIndex(item => item.idItem === id);
            // console.log(deleteIndex);
            itemsPengalamanKerja.splice(deleteIndex, 1);
            $( "#perusahaan" ).focus();

            if(itemsPengalamanKerja.length == 0) {
                $( "#list_pengalaman_kerja" ).append( `
                    <tr id="dummy_data_pengalaman_kerja">
                        <td colspan="5">Isi minimal 1 data</td>
                    </tr>
                ` );
            }
            console.table(itemsPengalamanKerja);
            // console.log(idItem);
        }

        function removeListKemampuanBahasaAsing(id){
            // console.log(id);
            var idItem = id.substr(id.length - 1);
            // console.log(idItem);

            $( "#" + id ).remove();

            const deleteIndex = itemsKemampuanBahasaAsing.findIndex(item => item.idItem === id);
            // console.log(deleteIndex);
            itemsKemampuanBahasaAsing.splice(deleteIndex, 1);
            $( "#bahasa" ).focus();

            if(itemsKemampuanBahasaAsing.length == 0) {
                $( "#list_kemampuan_bahasa_asing" ).append( `
                    <tr id="dummy_data_kemampuan_bahasa_asing">
                        <td colspan="6">Isi minimal 1 data</td>
                    </tr>
                ` );
            }
            console.table(itemsKemampuanBahasaAsing);
            // console.log(idItem);
        }

    </script>
@endsection

@section('title')
    Data Pelamar
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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            {{-- @foreach ($errors->all() as $error) --}}
                                <li>Data belum lengkap, Pastikan Semua Data Terisi</li>
                            {{-- @endforeach --}}
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-12">
                <div class="card">

                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <form action="{{ route('alternatif-biodata-store') }}" method="POST" id="dataForm" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <input type="hidden" name="pengalaman_kerja" id="pengalamanKerja">
                                <input type="hidden" name="kemampuan_bahasa_asing" id="kemampuanBahasaAsing">
                                <div class="row justify-content-between">
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Nama</label>
                                            <input type="text" name="nama" class="form-control" id="" placeholder="Nama" value="{{ $biodata->nama ?? '' }}">
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Email</label>
                                            <input type="text" name="email" class="form-control" id="" placeholder="Email" value="{{ $biodata->email ?? '' }}">
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label for="basicInput">No.Handphone</label>
                                            <input type="text" name="no_hp" class="form-control" id="" placeholder="No.Handphone" value="{{ $biodata->no_hp ?? '' }}">
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Tanggal Lahir</label>
                                            <form action="">
                                                <input type='text' name="tanggal_lahir" class="form-control tanggal_lahir" id="" placeholder="Data Of Birth"  value="{{ $biodata->tanggl_lahir ?? '' }}">
                                            </form>
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir" class="form-control" id="" placeholder="Place Of Birth" value="{{ $biodata->tempat_lahir ?? '' }}">
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Jenis Kelamin</label>
                                            <select class="custom-select" name="jenis_kelamin" id="customSelect">
                                                @if ($biodata != null)
                                                    <option {{ $biodata->jenis_kelamin == null ? 'selected' : "" }} value="">Pilih jenis kelamin</option>
                                                    <option {{ $biodata->jenis_kelamin == "L"  ? 'selected' : "" }} value="L">Laki-laki</option>
                                                    <option {{ $biodata->jenis_kelamin == "P"  ? 'selected' : "" }} value="P">Perempuan</option>
                                                @else
                                                    <option selected value="">Pilih jenis kelamin</option>
                                                    <option value="L">Laki-laki</option>
                                                    <option value="P">Perempuan</option>
                                                @endif
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Status</label>
                                            <select class="custom-select" name="status" id="customSelect">
                                                @if ($biodata != null)
                                                    <option {{ $biodata->status == null ? 'selected' : "" }}>Pilih status</option>
                                                    <option {{ $biodata->status == "Belum Menikah"  ? 'selected' : "" }} value="Belum Menikah">Belum Menikah</option>
                                                    <option {{ $biodata->status == "Menikah"  ? 'selected' : "" }} value="Menikah">Menikah</option>
                                                    <option {{ $biodata->status == "Janda / Duda"  ? 'selected' : "" }} value="Janda / Duda">Janda / Duda</option>
                                                @else
                                                    <option selected>Pilih status</option>
                                                    <option value="Belum Menikah">Belum Menikah</option>
                                                    <option value="Menikah">Menikah</option>
                                                    <option value="Janda / Duda">Janda / Duda</option>
                                                @endif
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Alamat</label>
                                            <input type="text" name="alamat" class="form-control" id="" placeholder="Masukkan Alamat" value="{{ $biodata->alamat ?? '' }}">
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Pendidikan Terakhir</label>
                                            <select class="custom-select" name="pendidikan_terakhir" id="customSelect">
                                                @if ($biodata != null)
                                                    <option {{ $biodata->pendidikan_terakhir == null ? 'selected' : "" }} >Pilih pendidikan terakhir</option>
                                                    <option {{ $biodata->pendidikan_terakhir == "SD"  ? 'selected' : "" }} value="SD">Sekolah Dasar (Setara)</option>
                                                    <option {{ $biodata->pendidikan_terakhir == "SMP"  ? 'selected' : "" }} value="SMP">Sekolah Menengah Pertama (Setara)</option>
                                                    <option {{ $biodata->pendidikan_terakhir == "SMA"  ? 'selected' : "" }} value="SMA">Sekolah Menengah Atas / Kejuruan (Setara)</option>
                                                    <option {{ $biodata->pendidikan_terakhir == "D3"  ? 'selected' : "" }} value="D3">Diploma-3 (Setara)</option>
                                                    <option {{ $biodata->pendidikan_terakhir == "S1"  ? 'selected' : "" }} value="S1">Strata-1 (Setara)</option>
                                                    <option {{ $biodata->pendidikan_terakhir == "S2"  ? 'selected' : "" }} value="S2">Strata-2 (Setara)</option>
                                                    <option {{ $biodata->pendidikan_terakhir == "S3"  ? 'selected' : "" }} value="S3">Strata-3 (Setara)</option>
                                                @else
                                                    <option selected>Pilih pendidikan terakhir</option>
                                                    <option value="SD">Sekolah Dasar (Setara)</option>
                                                    <option value="SMP">Sekolah Menengah Pertama (Setara)</option>
                                                    <option value="SMA">Sekolah Menengah Atas / Kejuruan (Setara)</option>
                                                    <option value="D3">Diploma-3 (Setara)</option>
                                                    <option value="S1">Strata-1 (Setara)</option>
                                                    <option value="S2">Strata-2 (Setara)</option>
                                                    <option value="S3">Strata-3 (Setara)</option>
                                                @endif
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-6 border-right">
                                                <div class="row align-items-center">
                                                    <div class="col-4">
                                                        <fieldset class="form-group">
                                                            <label for="basicInput">Nama Perusahaan</label>
                                                            <input type="text" class="form-control" id="perusahaan" placeholder="Nama Perusahaan" value="">
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-3">
                                                        <fieldset class="form-group">
                                                            <label for="basicInput">Jabatan</label>
                                                            <input type="text" class="form-control" id="jabatan" placeholder="Jabatan" value="">
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-2">
                                                        <fieldset class="form-group">
                                                            <label for="basicInput">Lama Kerja</label>
                                                            <input type="number" class="form-control" id="lama_kerja" placeholder="" value="">
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-1 px-0">
                                                        <p class="m-0">Bulan</p>
                                                    </div>
                                                    <div class="col-2 text-right">
                                                        <button type="button" onclick="addListPengalamanKerja()" class="btn btn-relief-primary"><i class="feather icon-plus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="row mt-n1">
                                                    <div class="col-12">
                                                        <p style="color: red;font-style: italic">* isi boleh lebih dari 1</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="table-responsive" style="overflow-x: hidden;">
                                                            <table id="datatable" class="table zero-configuration table-striped table-bordered text-center">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Perusahaan</th>
                                                                        <th>Jabatan</th>
                                                                        <th>Lama Kerja</th>
                                                                        <th>Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="list_pengalaman_kerja">
                                                                    <tr id="dummy_data_pengalaman_kerja">
                                                                        <td colspan="5">Tambah data terlebih dahulu</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 border-left">
                                                <div class="row align-items-center">
                                                    <div class="col-4">
                                                        <fieldset class="form-group">
                                                            <label for="basicInput">Read</label>
                                                            <select class="custom-select" id="bahasa">
                                                                <option selected="" value="0">Pilih</option>
                                                                <option value="Arab">Arab</option>
                                                                <option value="Inggris">Inggris</option>
                                                                <option value="Lainnya">Lainnya</option>
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-2">
                                                        <fieldset class="form-group">
                                                            <label for="basicInput">Read</label>
                                                            <select class="custom-select" id="read">
                                                                <option selected="" value="0">Pilih</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-2">
                                                        <fieldset class="form-group">
                                                            <label for="basicInput">Write</label>
                                                            <select class="custom-select" id="write">
                                                                <option selected="" value="0">Pilih</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-2">
                                                        <fieldset class="form-group">
                                                            <label for="basicInput">Speak</label>
                                                            <select class="custom-select" id="speak">
                                                                <option selected="" value="0">Pilih</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-2 pl-0 text-right">
                                                        <button type="button" onclick="addListKemampuanBahasaAsing()" class="btn btn-relief-primary"><i class="feather icon-plus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="row mt-n1">
                                                    <div class="col-4">
                                                        <p style="color: red;font-style: italic">* isi boleh lebih dari 1</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <p style="color: red;font-style: italic">* pilih nilai 1 - 5</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="table-responsive" style="overflow-x: hidden;">
                                                            <table id="datatable" class="table zero-configuration table-striped table-bordered text-center">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Bahasa</th>
                                                                        <th>Read</th>
                                                                        <th>Write</th>
                                                                        <th>Speak</th>
                                                                        <th>Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="list_kemampuan_bahasa_asing">
                                                                    <tr id="dummy_data_kemampuan_bahasa_asing">
                                                                        <td colspan="6">Tambah data terlebih dahulu</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Jurusan Pendidikan</label>
                                            <input type="text" class="form-control" name="jurusan_pendidikan" id="" placeholder="Masukkan Jurusan Anda" value="{{ $biodata->jurusan_pendidikan ?? '' }}">
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label for="basicInput">IPK</label>
                                            <input type="text" class="form-control" name="ipk" id="" placeholder="Masukkan IPK" value="{{ $biodata->ipk ?? '' }}">
                                        </fieldset>
                                    </div>

                                    <div class="col-2">
                                        <label for="basicInputFile">KTP</label>
                                        @if ($biodata != null)
                                            <img src="{{ Storage::disk('user_file')->exists($biodata->ktp) ? asset('storage/user-file/'.$biodata->ktp) : url('user-image/no-image.png') }}" class="img-fluid mb-1 rounded-sm" data-toggle="modal" data-target="#ktp-modal" alt="" style="width: 100%; height: 70%; object-fit: cover; cursor: pointer">
                                        @else
                                            <img src="{{ url('user-image/no-image.png') }}" class="img-fluid mb-1 rounded-sm" data-toggle="modal" data-target="#ktp-modal" alt="" style="width: 100%; height: 70%; object-fit: cover; cursor: pointer">
                                        @endif


                                        <div class="row">
                                            <div class="col-12">
                                                <fieldset class="form-group">
                                                    <label for="basicInputFile">KTP</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="file[ktp]" id="inputGroupFile01">
                                                        <label class="custom-file-label" for="inputGroupFile01">Upload File KTP</label>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <label for="basicInputFile">Pas Foto</label>
                                        @if ($biodata != null)
                                            <img src="{{ Storage::disk('user_file')->exists($biodata->pas_poto) ? asset('storage/user-file/'.$biodata->pas_poto) : url('user-image/no-image.png') }}" class="img-fluid mb-1 rounded-sm" data-toggle="modal" data-target="#pas-foto-modal" alt="" style="width: 100%; height: 70%; object-fit: cover; cursor: pointer">
                                        @else
                                            <img src="{{ url('user-image/no-image.png') }}" class="img-fluid mb-1 rounded-sm" data-toggle="modal" data-target="#pas-foto-modal" alt="" style="width: 100%; height: 70%; object-fit: cover; cursor: pointer">
                                        @endif
                                        <div class="row">
                                            <div class="col-12">
                                                <fieldset class="form-group">
                                                    <label for="basicInputFile">Pas Photo</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="file[pas_poto]" id="inputGroupFile01">
                                                        <label class="custom-file-label" for="inputGroupFile01">Upload Pas Foto</label>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <label for="basicInputFile">Ijazah</label>
                                        @if ($biodata != null)
                                            <img src="{{ Storage::disk('user_file')->exists($biodata->ijazah) ? asset('storage/user-file/'.$biodata->ijazah) : url('user-image/no-image.png') }}" class="img-fluid mb-1 rounded-sm" data-toggle="modal" data-target="#ijazah-modal" alt="" style="width: 100%; height: 70%; object-fit: cover; cursor: pointer">
                                        @else
                                            <img src="{{ url('user-image/no-image.png') }}" class="img-fluid mb-1 rounded-sm" data-toggle="modal" data-target="#ijazah-modal" alt="" style="width: 100%; height: 70%; object-fit: cover; cursor: pointer">
                                        @endif
                                        <div class="row">
                                            <div class="col-12">
                                                <fieldset class="form-group">
                                                    <label for="basicInputFile">Ijazah</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="file[ijazah]" id="inputGroupFile01">
                                                        <label class="custom-file-label" for="inputGroupFile01">Upload Ijazah</label>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <label for="basicInputFile">Transkrip Nilai</label>
                                        @if ($biodata != null)
                                            <img src="{{ Storage::disk('user_file')->exists($biodata->transkrip_nilai) ? asset('storage/user-file/'.$biodata->transkrip_nilai) : url('user-image/no-image.png') }}" class="img-fluid mb-1 rounded-sm" data-toggle="modal" data-target="#nilai-modal" alt="" style="width: 100%; height: 70%; object-fit: cover; cursor: pointer">
                                        @else
                                            <img src="{{ url('user-image/no-image.png') }}" class="img-fluid mb-1 rounded-sm" data-toggle="modal" data-target="#nilai-modal" alt="" style="width: 100%; height: 70%; object-fit: cover; cursor: pointer">
                                        @endif
                                        <div class="row">
                                            <div class="col-12">
                                                <fieldset class="form-group">
                                                    <label for="basicInputFile">Transkip Nilai</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="file[transkrip_nilai]" id="inputGroupFile01">
                                                        <label class="custom-file-label" for="inputGroupFile01">Upload Transkip Nilai</label>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <label for="basicInputFile">Portofolio</label>
                                        @if ($biodata != null)
                                            <img src="{{ Storage::disk('user_file')->exists($biodata->portofolio) ? asset('storage/user-file/'.$biodata->portofolio) : url('user-image/no-image.png') }}" class="img-fluid mb-1 rounded-sm" data-toggle="modal" data-target="#portofolio-modal" alt="" style="width: 100%; height: 70%; object-fit: cover; cursor: pointer">
                                        @else
                                            <img src="{{ url('user-image/no-image.png') }}" class="img-fluid mb-1 rounded-sm" data-toggle="modal" data-target="#portofolio-modal" alt="" style="width: 100%; height: 70%; object-fit: cover; cursor: pointer">
                                        @endif
                                        <div class="row">
                                            <div class="col-12">
                                                <fieldset class="form-group">
                                                    <label for="basicInputFile">Portofolio</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="file[portofolio]" id="inputGroupFile01">
                                                        <label class="custom-file-label" for="inputGroupFile01">Upload Portofolio</label>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
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
                                                @if ($biodata != null)
                                                    <img src="{{ Storage::disk('user_file')->exists($biodata->ktp) ? asset('storage/user-file/'.$biodata->ktp) : url('user-image/no-image.png') }}" class="img-fluid mb-1 rounded-sm" style="width: 100%; height: 95%; object-fit: cover;">
                                                @else
                                                    <img src="{{ url('user-image/no-image.png') }}" class="img-fluid mb-1 rounded-sm" style="width: 100%; height: 95%; object-fit: cover;">
                                                @endif
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
                                                @if ($biodata != null)
                                                    <img src="{{ Storage::disk('user_file')->exists($biodata->pas_poto) ? asset('storage/user-file/'.$biodata->pas_poto) : url('user-image/no-image.png') }}" class="img-fluid mb-1 rounded-sm" style="width: 100%; height: 95%; object-fit: cover;">
                                                @else
                                                    <img src="{{ url('user-image/no-image.png') }}" class="img-fluid mb-1 rounded-sm" style="width: 100%; height: 95%; object-fit: cover;">
                                                @endif
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
                                                @if ($biodata != null)
                                                    <img src="{{ Storage::disk('user_file')->exists($biodata->ijazah) ? asset('storage/user-file/'.$biodata->ijazah) : url('user-image/no-image.png') }}" class="img-fluid mb-1 rounded-sm" style="width: 100%; height: 95%; object-fit: cover;">
                                                @else
                                                    <img src="{{ url('user-image/no-image.png') }}" class="img-fluid mb-1 rounded-sm" style="width: 100%; height: 95%; object-fit: cover;">
                                                @endif
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
                                                @if ($biodata != null)
                                                    <img src="{{ Storage::disk('user_file')->exists($biodata->transkrip_nilai) ? asset('storage/user-file/'.$biodata->transkrip_nilai) : url('user-image/no-image.png') }}" class="img-fluid mb-1 rounded-sm" style="width: 100%; height: 95%; object-fit: cover;">
                                                @else
                                                    <img src="{{ url('user-image/no-image.png') }}" class="img-fluid mb-1 rounded-sm" style="width: 100%; height: 95%; object-fit: cover;">
                                                @endif
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
                                                @if ($biodata != null)
                                                    <img src="{{ Storage::disk('user_file')->exists($biodata->portofolio) ? asset('storage/user-file/'.$biodata->portofolio) : url('user-image/no-image.png') }}" class="img-fluid mb-1 rounded-sm" style="width: 100%; height: 95%; object-fit: cover;">
                                                @else
                                                    <img src="{{ url('user-image/no-image.png') }}" class="img-fluid mb-1 rounded-sm" style="width: 100%; height: 95%; object-fit: cover;">
                                                @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning waves-effect waves-light" data-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-relief-success btn-block waves-effect waves-light">Simpan</button>
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
