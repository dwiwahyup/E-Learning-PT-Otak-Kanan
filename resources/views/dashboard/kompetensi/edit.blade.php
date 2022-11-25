@extends('layouts.dashboard')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <a class="btn btn-link mb-2" href="{{URL::previous()}}">
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
                <form action="{{route('program.kompetensi.update', ['program' => $program->id, 'kompetensi' => $kompetensi->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Kompetensi</label>
                                <input type="text" class="form-control" placeholder="Nama Kompetensi" name="nama_kompetensi" value="{{old('nama_kompetensi') ?? $kompetensi->nama_kompetensi}}">
                            </div>
                            <div class="form-group">
                                <label>Target Pengembangan Keterampilan</label>
                                <textarea name="target_pengembangan_keterampilan" style="height:100px;" class="form-control"
                                    placeholder="Target Pengembangan Keterampilan">{{$kompetensi->target_pengembangan_keterampilan}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Detail Pembelajaran</label>
                                <textarea name="detail_pembelajaran" style="height:100px;" class="form-control"
                                    placeholder="Detail Pembelajaran">{{$kompetensi->detail_pembelajaran}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Metode Asesment</label>
                                <textarea name="metode_asesment" style="height:100px;" class="form-control"
                                    placeholder="Metode Asesment">{{$kompetensi->metode_asesment}}</textarea>
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
