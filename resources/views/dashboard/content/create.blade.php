@extends('layouts.dashboard')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
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

        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i></i> Tambah Materi Baru
            </div>
            <div class="card-body">
                <form action="{{route('coursecategory.chapter.content.store', ['coursecategory' => $coursecategory->id, 'chapter' => $chapter->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Link Vidio</label>
                                <input type="text" name="vidio" class="form-control">
                                <small class="form-text text-danger">Please input link form youtube like : https://www.youtube.com/embed/tgbNymZ7vqY</small>
                            </div>
                            <div class="form-group">
                                <label>Thumbnile</label>
                                <input type="file" name="thumbnaile" class="form-control">
                                <small class="form-text mb-3 text-danger">Please input image in size 400X800</small>
                            </div>
                            <div class="form-group">
                                <label>Text</label>
                                <textarea class="editor" name="text"></textarea>
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