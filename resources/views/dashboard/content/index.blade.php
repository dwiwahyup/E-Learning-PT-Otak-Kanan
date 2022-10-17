@extends('layouts.dashboard')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{('/dashboard')}}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{('/dashboard/coursecategory')}}">Course</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/dashboard/chapter/{{$chapters_id->course_categories_id}}">
                    {{$chapters_id->name}}
                </a>
            </li>
            <li class="breadcrumb-item active">Content</li>
        </ol>
        {{-- @dd($data) --}}
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
                <i class="fa fa-table"></i> Content Data
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <p><a href="/dashboard/content/create/{{$id}}" class="btn btn-secondary plus"> Add Content</a></p>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Text</th>
                                <th>Thumbnile</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Text</th>
                                <th>Thumbnile</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data as $data)
                            <tr>
                                <td>{{$data->name}}</td>
                                <td>{!! Str::words($data->text, 50) !!}</td>
                                {{-- <td>{{$data->vidio}}</td> --}}
                                <td>    
                                        @if ($data->thumbnaile != null)
                                            <img src="{{url('/content/thumbnaile/'.$data->thumbnaile)}}" alt="" width="200px" height="100px">
                                        @else
                                        @endif
                                </td>
                                <td>
                                    {{$data->created_at}}
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="/dashboard/content/edit/{{$data->id}}" class="btn btn-success btn-md">Edit</a>
                                        <a href="/dashboard/content/delete/{{$data->id}}" class="btn btn-danger btn-md ml-2" >Delete</a>
                                        <a href="/dashboard/content/preview/{{$data->id}}" class="btn btn-danger btn-md ml-2" >Preview</a>
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