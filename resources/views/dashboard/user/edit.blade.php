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
        <li class="breadcrumb-item active">User</li>
    </ol>
    <div class="box_general padding_bottom">
        <div class="header_box version_2">
            <h2><i class="fa fa-file"></i> Edit User</h2>
        </div>
        {{-- @dd($data) --}}
    @foreach ($data as $dataa)
    <form action="/dashboard/user/update" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <input type="hidden" name="id" value="{{ $dataa->id }}"> <br />
                <div class="form-group">
                    <label>Name</label>
                    <input value="{{$dataa->name}}" type="text" name="name" class="form-control">
                </div>
            </div>
        </div>
        <!-- /row-->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Email</label>
                    <input value="{{$dataa->email}}" type="text" name="email" class="form-control">
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Description</label>
                    <textarea type="text" class="form-control" name="description">{{$data->description}}</textarea>
                   <textarea type="text" class="editor" name="description">{{$data->description}}</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>File</label>
                    <ol><input type="file" name="berkas" /></ol>
                    <form action="/file-upload" class="dropzone"></form>
                </div>
            </div>
        </div> --}}
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