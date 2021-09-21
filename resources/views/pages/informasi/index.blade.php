@extends('layouts.app')

@section('custom_styles')

@endsection

@section('prepend_script')

@endsection

@section('append_script')

@endsection

@section('title')
    Informasi
@endsection

@section('content')
<div class="content-body">
    <!-- Zero configuration table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-1">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="card-title">Informasi Pengumuman Seleksi</h4>
                            </div>
                            <div class="col-12">
                                <p>Terima Kasih Telah Mengisi Data Diri Anda, Berikut Ini Adalah Hasil Seleksi Nama Nama Calon Karyawan Yang Lulus dan Tidak Lulus</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header pb-1">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="card-title">Informasi Pengumuman Lulus Seleksi:</h4>
                            </div>
                            <div class="col-12">
                                <div class="table-responsive" style="overflow-x: hidden;">
                                    <table id="datatable" class="table zero-configuration table-striped table-bordered text-center">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> 1 </td>
                                                <td> Novita Pratiwi </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header pb-1">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="card-title">Informasi Pengumuman Tidak Lulus Seleksi:</h4>
                            </div>
                            <div class="col-12">
                                <div class="table-responsive" style="overflow-x: hidden;">
                                    <table id="datatable" class="table zero-configuration table-striped table-bordered text-center">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> 1 </td>
                                                <td> Novita Pratiwi </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-1">
                        <div class="row">
                            <div class="col-12">
                                <i class="feather icon-user"></i><span class="menu-title">082272276352</span>
                            </div>
                            <div class="col-12">
                                <i class="feather icon-mail"></i><span class="menu-title">novitapratiwi8@gmail.com</span>
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
