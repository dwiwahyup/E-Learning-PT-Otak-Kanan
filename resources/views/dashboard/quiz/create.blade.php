@extends('layouts.dashboard')

@section('content')


<div class="content-wrapper">
    <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Quiz</li>
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
            <h2><i class="fa fa-file"></i>Quiz</h2>
        </div>

    <form action="/dashboard/quiz/store" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="chapters_id" value="{{$id}}"> <br/>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Question</label>
                    {{-- <input type="text" name="description" style="height: 150px" class="form-control"> --}}
                    <br>
                    <textarea type="text" class="form-control" name="question"></textarea>
                </div>
            </div>
        </div>
        <!-- /row-->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Answer</label>
                    {{-- <input type="text" name="description" style="height: 150px" class="form-control"> --}}
                    <br>
                    <textarea type="text" class="form-control" name="answer"></textarea>
                </div>
            </div>
        </div>
        <!-- /row-->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>File</label>
                    <input type="file" name="image" class="form-control" />
                    {{-- <form action="/file-upload" class="dropzone"></form> --}}
                    <small class="form-text"> Please input image</small>
                </div>
            </div>
        </div>
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