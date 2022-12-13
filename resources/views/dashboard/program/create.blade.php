@extends('layouts.dashboard')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <a class="btn btn-link mb-2" href="">
            <i class="fa fa-chevron-left" aria-hidden="true"></i> Back
        </a>

        @if ($errors->any())
        <div class="mb-5" role="alert">
            <div class="alert alert-danger" role="alert">
                <p>
                    <ul>
                        @foreach ($errors->all() as $eror)
                        <li>{{$eror}}</li>
                        @endforeach
                    </ul>
                </p>
            </div>
        </div>
        @endif

        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i></i> Tambah Materi Baru
            </div>
            <div class="card-body">
                <form action="{{route('program.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">

                                        <label for="inputState">Nama Program</label>
                                        <select id="inputState" class="form-control" name="course_categories_id">
                                            @foreach ($data as $course)
                                            <option value="{{$course->id}}">{{$course->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Jumlah SKS</label>
                                        <input type="text" name="jumlah_sks" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tanggal Mulai</label>
                                        <input class="form-control" type="date" name="tanggal_mulai">
                                        <i class="icon_calendar"></i>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tanggal Selesai</label>
                                        <input class="form-control" type="date" name="tanggal_selesai">
                                        <i class="icon_calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Metode Kegiatan</label>
                                        <input class="form-control" type="name" name="metode_kegiatan">
                                        <i class="icon_calendar"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Kegiatan</label>
                                        <input class="form-control" type="name" name="kegiatan">
                                        <i class="icon_calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Rincian Kegiatan</label>
                                <textarea class="editor" name="rincian_kegiatan"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Kriteria Peserta</label>
                                <textarea class="editor" name="kriteria_peserta"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Informasi Kegiatan</label>
                                <textarea class="editor" name="informasi_tambahan"></textarea>
                            </div>
                        </div>
                    </div>
                    <p><button type="submit" class="btn btn-primary plus float-right">Save</button></p>
                </form>
            </div>
            <!-- /tables-->
        </div>
    </div>

    @endsection
