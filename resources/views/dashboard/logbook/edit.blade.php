@extends('layouts.dashboard')

@section('content')

{{-- <body class="fixed-nav sticky-footer" id="page-top"> --}}
<div class="content-wrapper">
    <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Log Book</li>
    </ol>

    <div class="box_general padding_bottom">
        <div class="header_box version_2">
            <h2><i class="fa fa-file"></i> Edit Log Book</h2>
        </div>
    @foreach ($data as $data)
    <form action="/logbook/update" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <input type="hidden" name="id" value="{{ $data->id }}"> <br />
                <div class="form-group">
                    <label>Name</label>
                    <input value="{{$data->users}}" type="text" name="name" class="form-control">
                </div>
            </div>
        </div>
        <!-- /row-->
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Date</label>
                    <input value="{{$data->date}}" type="date" name="date" class="form-control datetimepicker" name="Appointment_time">
                </div>
            </div>
        </div>
        <!-- /row-->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Description</label>
                    <input value="{{$data->description}}" type="text" name="description" style="height: 150px" class="form-control">
                <div class="editor"></div>
                </div>
            </div>
        </div>
        <!-- /row-->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>File</label>
                    <ol><input type="file" name="berkas" /></ol>
                    {{-- <form action="/file-upload" class="dropzone"></form> --}}
                </div>
            </div>
        </div>
            <p><button type="submit" class="btn btn-primary plus float-right">Update</button></p>
        </form>
        @endforeach
    </div>	
    </div>
<!-- /.container-fluid-->
</div>
<!-- /.container-wrapper-->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fa fa-angle-up"></i>
</a>


@endsection