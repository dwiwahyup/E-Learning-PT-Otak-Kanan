@extends('layouts.dashboard')
@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Log Book</li>
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
                <i class="fa fa-table"></i> Log Book Data
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{-- <p><a href="/dashboard/logbook/create/{{ $id }}" class="btn btn-secondary plus"> Add Log Book</a></p> --}}
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Date</th>
                          <th>Description</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Name</th>
                          <th>Date</th>
                          <th>Description</th>
                          <th>Action</th>
                        </tr>
                      </tfoot>
                        <tbody>
                            @foreach ($data as $data)
                            <tr>
                              <td>{{$data->name}}</td>
                              <td>{{$data->date}}</td>
                              <td>{!! Str::limit($data->description, 70) !!}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="/dashboard/logbook/edit/{{$data->id}}" class="btn btn-success btn-md">Edit</a>
                                        <a href="/dashboard/logbook/delete/{{$data->id}}" class="btn btn-danger btn-md ml-2" >Delete</a>
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