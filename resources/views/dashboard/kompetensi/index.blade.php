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
            <li class="breadcrumb-item active">Kompetensi</li>
        </ol>

        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Kriteria
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <p><a href=""
                            class="btn btn-secondary plus"> Add Kriteria</a></p>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Kriteria Yang Dikembangkan</th>
                                <th>Target Pengembangan Keterampilan</th>
                                <th>Detail Pembelajaran</th>
                                <th>Metode Asesmen</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>                                
                                <th>Kriteria Yang Dikembangkan</th>
                                <th>Target Pengembangan Keterampilan</th>
                                <th>Detail Pembelajaran</th>
                                <th>Metode Asesmen</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="d-flex">
                                        <a href="" class="btn btn-success btn-md">Edit</a>
                                        <a href="" class="btn btn-danger btn-md ml-2" >Delete</a>
                                    </div>
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
