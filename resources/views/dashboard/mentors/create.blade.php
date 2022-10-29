@extends('layouts.dashboard')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Add Mentor</li>
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
            <div class="card-body">
                <form action="#" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gambar</label>
                                <input type="file" name="image" class="form-control">
                                <small class="form-text mb-3 text-danger">Please input image in size 400X800</small>
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Introduction</label>
                                <input type="text" name="email" class="form-control">
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