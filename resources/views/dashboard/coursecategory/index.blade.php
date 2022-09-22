@extends('layouts.dashboard')
@section('content')

<div class="content-wrapper">
<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active"> Course Category</li>
  </ol>
  @if ($message = Session::get('success'))
    <div class="mb-10">
        <div class="alert alert-success" role="alert">
            <p>{{$message}}</p>
          </div>
        {{-- <div class="bg-blue-500 text-white font-bold rounded-t px-4 py-2">
            Berhasil
        </div>
        <div class="border border-t-0 border-blue-400 rounded-b bg-blue-100 px-4 py-3 text-blue-700">
            <p>{{$message}}</p>
        </div> --}}
    </div>
  @endif
<!-- Example DataTables Card-->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-table"></i> Course Category</div>
    <div class="card-body">
      <p><a href="/dashboard/coursecategory/create" class="btn btn-secondary plus"> Add Course</a></p>
      <div class="table-responsive">
        
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Name Course</th>
              {{-- <th>Date</th>
              <th>Description</th> --}}
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Name</th>
              {{-- <th>Date</th>
              <th>Description</th> --}}
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach ($data as $data)
            <tr>
              <td>{{$data->name}}</td>
              {{-- <td>{{$data->date}}</td>
              <td>{!! Str::limit($data->description, 150) !!}</td> --}}
              <td>
                <div class="d-flex">
                  <a class="btn btn-info" href="coursecategory/edit/{{($data->id)}}">Edit</a>
                  <a class="btn btn-primary" href="coursecategory/delete/{{$data->id}}">Delete</a>
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