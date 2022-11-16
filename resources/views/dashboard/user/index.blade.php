@extends('layouts.dashboard')
@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">User</li>
        </ol>
        @if ($message = Session::get('error'))
                    <div class="mb-10">
                        <div class="alert alert-danger" role="alert">
                            <p>{{$message}}</p>
                        </div>
                    </div>
        @endif
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> 
                Users Data
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <p><a href="/dashboard/user/create/" class="btn btn-secondary plus"> Add User</a></p>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Roles</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      </tfoot>
                        <tbody>
                             @foreach ($data as $index => $dataa)
                            <tr>
                              <td>{{$index + 1}}</td>
                              <td>{{$dataa->name}}</td>
                              <td>{{$dataa->email}}</td>
                              <td>{{$dataa->roles}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('user.edit', $dataa->id)}}" class="btn btn-success btn-md">Edit</a>
                                        <form action="{{route('user.destroy', $dataa->id)}}" class="d-inline ml-2" method="POST">
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