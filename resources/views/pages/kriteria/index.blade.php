@extends('layouts.app')

@section('custom_styles')
<style>
    .dataTables_filter {
        display: none;
    }
</style>
@endsection

@section('prepend_script')

@endsection

@section('append_script')
<script>
    $(document).ready( function () {
        var table = $('.zero-configuration').DataTable({
            language: {
                search: "Cari data: ",
                searchPlaceholder: "Cari..."
            }
        });

        $("#searchTextBox").keyup(function() {
            table.search($(this).val()).draw() ;
        }); 
    } );
</script>
@endsection

@section('title')
    Kriteria
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">DATA KRITERIA</h2>
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
        <div class="card p-2">
            <div class="row justify-content-end">
                <div class="col-2">
                    <fieldset class="position-relative has-icon-left input-divider-left">
                        <input type="text" class="form-control" id="searchTextBox" placeholder="Search">
                        <div class="form-control-position">
                            <i class="feather icon-search"></i>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive" style="overflow-x: hidden;">
                                <table id="datatable" class="table zero-configuration table-striped table-bordered text-left">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Kriteria</th>
                                            <th>Jenis</th>
                                            <th class="text-center">Kepentingan</th>
                                            <th>Bobot</th>
                                            {{-- <th>Aksi</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataKriteria as $number => $kriteria)
                                            <tr>
                                                <td class="text-center"> {{ $number + 1 }} </td>
                                                <td> {{ $kriteria->kriteria }} </td>
                                                <td> {{ ucfirst($kriteria->jenis) }} </td>
                                                <td class="text-center"> {{ $kriteria->kepentingan }} </td>
                                                <td> {{ $kriteria->bobot ?? 'Data Belum diisi' }} </td>
                                                {{-- <td>
                                                    <button type="button" class="btn btn-icon btn-warning btn-relief-warning mr-1 mb-1 waves-effect waves-light editBtn" data-toggle="modal" data-target="#editBarang">
                                                        <i class="feather icon-eye"></i>
                                                    </button>
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
