@extends('layouts.dashboard')
@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Mentors</li>
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
                <i class="fa fa-table"></i> 
                Mentors Data
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <p><a href="/dashboard/mentors/create/" class="btn btn-secondary plus"> Add Mentors</a></p>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                            <th>No</th>
                            <th>Name Mentor</th>
                            <th>Course Category</th>
                            <th>Motivation</th>
                            <th>Image</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      </tfoot>
                        <tbody>
                             @foreach ($mentors as $index => $data)
                            <tr>

                              <td>{{$index + 1}}</td>
                              <td>{{$data->name}}</td>
                              <td>{{$data->courses->name}}</td>
                              <td>{{$data->motivation}}</td>
                              <td>
                                <img src="{{$data->image_url}}" alt="" width="80px" height="150px">
                            </td>
                                <td>
                                    <div class="inline-block">
                                        <a href="{{route('mentors.edit', $data->slug)}}" class="btn btn-success btn-md">Edit</a>
                                        <form action="{{route('mentors.destroy', $data->id)}}" class="d-inline" method="POST">
                                            {{ csrf_field() }}
                                            {{method_field('delete')}}
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
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