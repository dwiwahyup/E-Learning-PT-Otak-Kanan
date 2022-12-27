@extends('layouts.dashboard')
@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Logbooks Course</li>
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
                <i class="fa fa-table"></i> Logbook data on course
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <p>
                        <a href="" type="button" class="btn btn-secondary btn-md" data-toggle="modal" data-target="#exampleModal">Add Schedule</a>
                    </p>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>Created by</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>Created by</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($schedule as $index => $data)
                            <tr>
                                <td>{{$index + 1}}</td>
                                <td>{{$data->date}}</td>
                                <td>{{$data->schedules->users->name}}</td>
                                <td>
                                    <form action="{{route('schedule_periods.schedule_logbooks.destroy', ['schedule_period' => $id_schedule_period, 'schedule_logbook' => $data->id])}}"
                                        class="d-inline" method="POST">
                                        {{ csrf_field() }}
                                        {{method_field('delete')}}
                                        <button class="btn btn-danger ml-1">Delete</button>
                                    </form>
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
    {{-- Modal create schedule --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Period</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('schedule_periods.schedule_logbooks.store', $id_schedule_period)}}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                                <div class="form-group">
                                    <label>Start date</label>
                                    <input class="form-control" type="date" name="start_date">
                                    <i class="icon_calendar"></i>
                                </div>
                        </div>
                        <div class="col">
                                <div class="form-group">
                                    <label>End date</label>
                                    <input class="form-control" type="date" name="end_date">
                                    <i class="icon_calendar"></i>
                                </div>
                            </div>
                    </div>
                    <!-- /row-->
                <p><button type="submit" class="btn btn-primary plus float-right">Save</button></p>
            </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </form>
        </div>
    </div>
</div>
</div>
@endsection
