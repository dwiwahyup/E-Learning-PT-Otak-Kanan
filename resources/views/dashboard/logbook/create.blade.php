@extends('layouts.dashboard')

@section('content')


<div class="content-wrapper">
    <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Log Book</li>
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

    <div class="box_general padding_bottom">
        <div class="header_box version_2">
            <h2><i class="fa fa-file"></i>Log Book</h2>
        </div>

    <form action="/dashboard/logbook/store" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="users_id" value="{{ $id }}"> <br />

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name"  class="form-control" placeholder="">
                    {{-- <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control" placeholder=""> --}}
                </div>
            </div>
        </div>
        <!-- /row-->
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="date" class="form-control datetimepicker" name="Appointment_time">
                </div>
            </div>
        </div>
        <!-- /row-->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Description</label>
                    {{-- <input type="text" name="description" style="height: 150px" class="form-control"> --}}
                    <br>
                    <textarea type="text" class="form-control" name="description"></textarea>
                </div>
            </div>
        </div>
        <!-- /row-->
        {{-- <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>File</label>
                    <ol><input type="file" name="berkas" /></ol>
                    {{-- <form action="/file-upload" class="dropzone"></form> --}}
                {{-- </div>
            </div>
        </div> --}}
            <p><button type="submit" class="btn btn-primary plus float-right">Save</button></p>
        </form>
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