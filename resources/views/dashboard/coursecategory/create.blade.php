@extends('layouts.dashboard')

@section('content')

<body class="fixed-nav sticky-footer" id="page-top">
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            {{-- <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Course Category</li>
            </ol> --}}

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

            <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    <h2><i class="fa fa-file"></i>Course Category</h2>
                </div>

                <form action="{{route('coursecategory.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name Course</label>
                                <input type="text" name="name" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <!-- /row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Introduction</label>
                                <textarea type="text" class="form-control" name="introduction"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Images</label>
                                <input type="file" name="image" class="form-control">
                                <small class="form-text mb-3 text-danger">Please input image in size 400X800</small>
                            </div>
                        </div>
                    </div>
                    <!-- /row-->
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