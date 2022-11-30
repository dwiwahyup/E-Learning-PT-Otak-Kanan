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
                <i class="fa fa-table"></i> Program Data
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <p><a href="/dashboard/program/create/" class="btn btn-secondary plus"> Add Program</a></p>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jumlah Sks</th>
                                <th>Tanggal</th>
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
                                <th>Tanggal</th>
                                <th>Metode Kegiatan</th>
                                <th>Kegiatan</th>
                                <th>Rincian Kegiatan</th>
                                <th>Kriteria Peserta</th>
                                <th>Informasi Tambahan</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data as $data)
                            <tr>
                                <td>{{$data->nama}}</td>
                                <td>{{$data->jumlah_sks}}</td>
                                <td>{{$data->tanggal_mulai}} Sampai {{$data->tanggal_selesai}}</td>
                                <td>{{$data->metode_kegiatan}}</td>
                                <td>{{$data->kegiatan}}</td>
                                <td>
                                    {!! Str::words($data->rincian_kegiatan, 20) !!}
                                </td>
                                <td>
                                    {!! Str::words($data->kriteria_peserta, 20) !!}
                                </td>
                                <td>
                                    {!! Str::words($data->informasi_tambahan, 20) !!}
                                </td>
                                <td>
                                    <center>
                                        <div class="">
                                            <a href="{{route('program.edit', $data->slug)}}"
                                                class="btn btn-success btn-md ml-1">Edit</a>
                                            <form action="{{route('program.destroy', $data->id)}}"
                                                class="d-inline" method="POST">
                                                {{ csrf_field() }}
                                                {{method_field('delete')}}
                                                <button class="btn btn-danger ml-1">Delete</button>
                                            </form>
                                        </div>
                                        <br>
                                        <div class="d-flex">
                                            <a href="{{route('program.kompetensi.index', $data->slug)}}" class="btn btn-secondary btn-md ml-2">Kompetensi</a>
                                            <a href="/dashboard/program/preview/{{$data->slug}}" class="btn btn-info btn-md ml-2">Preview</a>
                                        </div>
                                    </center>
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
