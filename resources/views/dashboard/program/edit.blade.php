@extends('layouts.dashboard')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <a class="btn btn-link mb-2" href="{{URL::previous()}}">
            <i class="fa fa-chevron-left" aria-hidden="true"></i> Back
        </a>

        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i></i> Edit Progarm
            </div>
            <div class="card-body">
                <form action="{{route('program.update', $data->id)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">

                                        <label for="inputState">Nama Program</label>
                                        <select id="inputState" class="form-control" name="nama">

                                            <option>{{old('nama') ?? $data->nama}}</option>
                                            @foreach ($dataa as $course)
                                            <option>{{$course->name}}</option>
                                            @endforeach
                                            
                                            

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Jumlah SKS</label>
                                        <input type="text" name="jumlah_sks" class="form-control" value="{{old('jumlah_sks') ?? $data->jumlah_sks}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tanggal Mulai</label>
                                        <input class="form-control" type="date" name="tanggal_mulai" value="{{old('tanggal_mulai') ?? $data->tanggal_mulai}}">
                                        <i class="icon_calendar"></i>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tanggal Selesai</label>
                                        <input class="form-control" type="date" name="tanggal_selesai" value="{{old('tanggal_selesai') ?? $data->tanggal_selesai}}">
                                        <i class="icon_calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Metode Kegiatan</label>
                                        <input class="form-control" type="name" name="metode_kegiatan" value="{{old('metode_kegiatan') ?? $data->metode_kegiatan}}">
                                        <i class="icon_calendar"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Kegiatan</label>
                                        <input class="form-control" type="name" name="kegiatan" value="{{old('kegiatan') ?? $data->kegiatan}}">
                                        <i class="icon_calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Rincian Kegiatan</label>
                                <textarea class="editor" name="rincian_kegiatan">{{old('rincian_kegiatan') ?? $data->rincian_kegiatan}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Kriteria Peserta</label>
                                <textarea class="editor" name="kriteria_peserta">{{old('kriteria_peserta') ?? $data->kriteria_peserta}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Informasi Kegiatan</label>
                                <textarea class="editor" name="informasi_tambahan">{{old('informasi_tambahan') ?? $data->informasi_tambahan}}</textarea>
                            </div>
                        </div>
                    </div>
                    <p><button type="submit" class="btn btn-primary plus float-right">Update</button></p>
                </form>
            </div>
            <!-- /tables-->
        </div>
    </div>

    @endsection
