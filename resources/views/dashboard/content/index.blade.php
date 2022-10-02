@extends('layouts.dashboard')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Content</li>
        </ol>
        @if ($message = Session::get('success'))
                    <div class="mb-10">
                        <div class="alert alert-success" role="alert">
                            <p>{{$message}}</p>
                        </div>
                    </div>
                @endif
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Data Table Example
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <p><a href="/dashboard/content/create/{{$id}}" class="btn btn-secondary plus"> Add Content</a></p>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Text</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Text</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data as $data)
                            <tr>
                                <td>{{$data->name}}</td>
                                <td>{!! Str::limit($data->text, 150) !!}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="/dashboard/content/edit/{{$data->id}}" class="btn btn-success btn-md">Edit</a>
                                        <a href="/dashboard/content/delete/{{$data->id}}" class="btn btn-danger btn-md ml-2" >Hapus</a>
                                        <a href="" data-toggle="modal" data-target="#exampleModal" class="btn btn-danger btn-md ml-2" >Add Image</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
        <!-- /tables-->
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Image</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/dashboard/contentGallery/store" method="post" enctype="multipart/form-data" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="contents_id" value="{{$data->id}}">
                        Pilih file: <input type="file" name="images[]" multiple accept="images/*"/>
                       
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit" >Save</button>
                    {{-- <a class="btn btn-primary" href="login.html">Logout</a> --}}
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- /container-fluid-->
</div>

@endsection