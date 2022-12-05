@extends('layouts.dashboard')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{('/dashboard')}}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{('/dashboard/program')}}">Program</a>
            </li>
            <li class="breadcrumb-item active">Kompetensi</li>
        </ol>
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                <p>{{$message}}</p>
            </div>
        @endif
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Kriteria
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <p><a href="{{route('program.kompetensi.create', $nama_program->slug)}}"
                            class="btn btn-secondary plus"> Add Kompetensi</a></p>
                    <div class="header_box">
                        <h2 class="d-inline-block">Program : {{$nama_program->nama}}</h2>
                    </div>
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
                            @foreach ($data as $data)
                            <tr>
                                <td>{{$data->nama_kompetensi}}</td>
                                <td>{{$data->target_pengembangan_keterampilan}}</td>
                                <td>{{$data->detail_pembelajaran}}</td>
                                <td>{{$data->metode_asesment}}</td>
                                <td>
                                    <div class="">
                                        <a href="{{route('program.kompetensi.edit', ['program' => $data->programs->slug, 'kompetensi' => $data->slug])}}"
                                            class="btn btn-success btn-md">Edit</a>
                                        <form
                                            action="{{route('program.kompetensi.destroy', ['program' => $data->programs->id, 'kompetensi' => $data->id])}}"
                                            class="d-inline" method="POST">
                                            {{ csrf_field() }}
                                            {{method_field('delete')}}
                                            <button class="btn btn-danger">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
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
