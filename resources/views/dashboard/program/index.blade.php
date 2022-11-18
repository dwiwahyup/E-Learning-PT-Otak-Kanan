@extends('layouts.dashboard')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="">Program</a>
            </li>
        </ol>

        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Content Data
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <p><a href="" class="btn btn-secondary plus"> Add Content</a></p>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jumlah Sks</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Metode Kegiatan</th>
                                <th>Kegiatan</th>
                                <th>Rincian Kegiatan</th>
                                <th>Kriteria Peserta</th>
                                <th>Informasi Tambahan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Jumlah Sks</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Metode Kegiatan</th>
                                <th>Kegiatan</th>
                                <th>Rincian Kegiatan</th>
                                <th>Kriteria Peserta</th>
                                <th>Informasi Tambahan</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <center>
                                        <div class="">
                                            <a href="" class="btn btn-success btn-md">Edit</a>
                                            <a href="" class="btn btn-danger btn-md ml-2">Delete</a>
                                        </div>
                                        <br>
                                        <div class="d-flex">
                                            <a href="" class="btn btn-danger btn-md ml-2">Kriteria</a>
                                            <a href="" class="btn btn-danger btn-md ml-2">Preview</a>
                                        </div>
                                    </center>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
        <!-- /tables-->
    </div>
    <!-- /container-fluid-->
</div>

@endsection
