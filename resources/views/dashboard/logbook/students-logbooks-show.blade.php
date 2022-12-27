@extends('layouts.dashboard')
@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('logbooks.index')}}">Logbooks Course</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/dashboard/logbook/students/{{$user->courses->slug}}">Logbooks Student {{$user->courses->name}}</a>
            </li>
            <li class="breadcrumb-item active">{{$user->name}}</li>
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
                <i class="fa fa-table"></i> Logbook Data {{$user->name}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{-- <p><a href="/dashboard/logbook/create/{{ $id }}" class="btn btn-secondary plus"> Add Log
                    Book</a></p> --}}
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Submited on</th>
                                <th>Schedules</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Description</th>
                                <th>Submited on</th>
                                <th>Schedules</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($query as $item)
                            <tr>
                                <td>{{$item->description}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->schedules->periods->period_name}}</td>
                                <td>
                                    @if ($item->status == 0)
                                        Waiting
                                    @else
                                        Aproved
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex">
                                        {{-- <a href="/dashboard/logbook/students/approved/{{$item->id}}" class="btn btn-primary btn-md">Approved</a> --}}
                                        <a href="" type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#exampleModal">Edit</a>
                                    </div>
                            </tr>
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete chapter</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"></span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('logbooks.update', $item->id)}}"  method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label>Status</label>
                                                            <div class="styled-select">
                                                                <select name="status">
                                                                    <option value="{{$item->status}}">
                                                                    @if ($item->status == 0)
                                                                        Waiting
                                                                    @else
                                                                        Approved
                                                                    @endif
                                                                    </option>
                                                                        <option value="1">Approved</option>
                                                                        <option value="0">Waiting</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /row-->
                                            <p><button type="submit" class="btn btn-primary plus float-right">Update</button></p>
                                        </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
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
