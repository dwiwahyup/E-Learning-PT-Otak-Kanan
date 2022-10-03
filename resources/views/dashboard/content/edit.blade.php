@extends('layouts.dashboard')

@section('content')

{{-- @dd($data); --}}

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Update</li>
        </ol>

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
                <i></i>Update Data Materi
            </div>
            <div class="card-body">
                {{-- @dd($data); --}}
                @foreach ($data as $data)
                <form action="/dashboard/content/update" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="chapters_id" value="{{$data->chapters_id}}"><br>
                            <input type="hidden" name="id" value="{{ $data->id }}"> <br />
                            <div class="form-group">
                                <label>Nama Materi</label>
                                <input name="name" value="{{$data->name}}" type="text" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Deskripsi Materi</label>
                                        <input type="text" value="{{$data->text}}" name="text" class="form-control" style="height:150px">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        </div>
                        <button type="submit" class="btn btn-primary plus float-left">Update</button>
                </form>
                @endforeach
                    {{-- <p><a href="#0" class="btn btn-primary plus float-left">Update</a></p>    --}}
                </div>
                
        <!-- /tables-->
    </div>
</div>

@endsection
