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
        <li class="breadcrumb-item active">Quiz</li>
    </ol>
    <div class="box_general padding_bottom">
        <div class="header_box version_2">
            <h2><i class="fa fa-file"></i> Edit Quiz</h2>
        </div>
    @foreach ($data as $data)
    <form action="/dashboard/quiz/update" method="POST">
        @csrf
        <!-- /row-->
        <div class="row">
            <input type="hidden" name="chapters_id" value="{{ $data->id }}"> <br />
            <div class="col-md-12">
                <div class="form-group">
                    <label>Question</label>
                    <textarea type="text" class="form-control" name="question">{{$data->question}}</textarea>
                </div>
            </div>
        </div>
        <!-- /row-->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Answer</label>
                    <textarea type="text" class="form-control" name="answer">{{$data->answer}}</textarea>
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