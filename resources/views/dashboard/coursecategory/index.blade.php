@extends('layouts.dashboard')
@section('content')


<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Course</li>
        </ol>

        @if ($message = Session::get('success'))
                    <div class="mb-10">
                        <div class="alert alert-success" role="alert">
                            <p>{{$message}}</p>
                    </div>
                @endif

        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Course Data
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <p><a href="/dashboard/coursecategory/create/" class="btn btn-secondary plus"> Add Course</a></p>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Course Name</th>
                                <th>Introduction</th>
								<th>Chapter</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Course Name</th>
                                <th>Introduction</th>
								<th>Chapter</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($query as $data)
                            <tr>
                                <td>{{$data->name}}</td>
                                <td>{!! Str::limit($data->introduction, 120) !!}</td>
								<td>{{$data->chapters_count}} Chapter</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="/dashboard/chapter/{{$data->id}}" class="btn btn-success btn-md">Chapter</a>
                                        <a href="coursecategory/edit/{{$data->id}}" class="btn btn-danger btn-md ml-2" >Edit</a>
                                        <a href="coursecategory/delete/{{$data->id}}" class="btn btn-danger btn-md ml-2" >Delete</a>
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