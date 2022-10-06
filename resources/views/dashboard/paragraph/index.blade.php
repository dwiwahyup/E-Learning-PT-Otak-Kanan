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
            {{-- @dd($id) --}}
            <div class="card-body">
                <div class="table-responsive">
                    <p><a href="/dashboard/paragraph/create/{{$id}}" class="btn btn-secondary plus"> Add Paragraph</a></p>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>text</th>
                                <th>vidio url</th>
                                <th>image</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>text</th>
                                <th>vidio url</th>
                                <th>image</th>
                                <th>action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($query as $data)
                            <tr>
                                <td>{!! Str::limit($data->text, 400) !!}</td>
                                <td>{{$data->vidio_url}}</td>
                                <td>
                                    @if ($data->image_url != null)
                                        <img src="{{url('/paragraph/imagecontent/'.$data->image_url)}}" alt="" width="200px" height="100px">
                                    @else
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="/dashboard/paragraph/edit/{{$data->id}}" class="btn btn-success btn-md">Edit</a>
                                        <a href="/dashboard/paragraph/delete/{{$data->id}}" class="btn btn-danger btn-md ml-2" >Delete</a>
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
    <!-- /container-fluid-->
</div>

@endsection