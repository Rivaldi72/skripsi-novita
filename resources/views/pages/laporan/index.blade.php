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
            addTableButtons();

            $("#searchTextBox").keyup(function() {
                table.search($(this).val()).draw() ;
            }); 
        } );

        function addTableButtons() {
            var table = $('.zero-configuration').DataTable();
        
            new $.fn.dataTable.Buttons( table, {
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                } 
            );
            
            table.buttons( 0, null ).containers().appendTo( '.button-datatable-print' );
        }
        
    </script>
@endsection

@section('title')
    Laporan
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">LAPORAN SELEKSI</h2>

            </div>
        </div>
    </div>
    <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
        <div class="form-group breadcrum-right">

        </div>
    </div>
</div>
<div class="card p-2">
    <div class="row justify-content-between">
        <div class="col-2 button-datatable-print">

        </div>
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

<div class="card">
    <div class="card-content">
        <div class="card-body card-dashboard">
            <div class="table-responsive" style="overflow-x: hidden;">
                <table id="datatable" class="table zero-configuration table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelamar</th>
                            <th>Nilai Akhir</th>
                            <th>Peringkat</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataUser as $number => $pelamar)
                            <tr>
                                <td> {{ $number + 1 }} </td>
                                <td> {{ $pelamar->nama }} </td>
                                <td> {{ $dataNilai[$number] }} </td>
                                <td> {{  array_search($dataNilaiAwal[$number], $dataNilaiSort) + 1 }} </td>
                                <td> {{ $pelamar->jabatan }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
