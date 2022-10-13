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
    <form action="/dashboard/quiz/update/{{$data->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- /row-->
        <div class="row">
            <input type="hidden" name="chapters_id" value="{{ $data->chapters_id }}"> <br />
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
                    <input type="file" name="image" class="form-control">
                    <small class="form-text mb-3 text-danger">Please input image in size 400X800</small>
                    @if ($data->image_url != null)
                        <p><img alt="" class="img-fluid" style="width: 800px; height: 400px;" src="{{url('quiz/quizimage/'.$data->image_url)}}"></p>
                    @else
                    @endif
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