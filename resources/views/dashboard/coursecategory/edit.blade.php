@extends('layouts.dashboard')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Course Category</li>
    </ol>
    <div class="box_general padding_bottom">
        <div class="header_box version_2">
            <h2><i class="fa fa-file"></i> Edit Course Category</h2>
        </div>
    @foreach ($data as $data)
    <form action="/dashboard/coursecategory/update" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="{{ $data->id }}" enctype="multipart/form-data" > <br/>
        @csrf
        <div class="row">
            <div class="col-md-6">

                <div class="form-group">
                    <label>Name Course</label>
                    <input value="{{$data->name}}" type="text" name="name" class="form-control">
                </div>
            </div>
        </div>
        <!-- /row-->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Introduction</label>
                    {{-- <input type="text" value="{{$data->introduction}}" class="form-control" name="introduction"> --}}
                    <textarea type="text" class="form-control" name="introduction">{{$data->introduction}}</textarea>
                    
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>images</label>
            <input type="file" name="image" class="form-control">
            <small class="form-text mb-3 text-danger">Please input image in size 400X800</small>
            @if ($data->image_url != null)
                <p><img alt="" class="img-fluid" style="width: 800px; height: 400px;" src="{{url('coursecategory/courseimage/'.$data->image_url)}}"></p>
            @else
                
            @endif
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