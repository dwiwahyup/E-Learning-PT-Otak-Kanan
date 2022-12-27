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
                        <a href="" type="button" class="btn btn-secondary btn-md" data-toggle="modal" data-target="#exampleModal">Add Period</a>
                    </p>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name Period</th>
                                <th>Create by</th>
                                <th>Course</th>
                                <th>Create at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Name Period</th>
                                <th>Create by</th>
                                <th>Course</th>
                                <th>Create at</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($period as $index => $data)
                            <tr>
                                <td>{{$index + 1}}</td>
                                <td>{{$data->period_name}}</td>
                                <td>{{$data->users->name}}</td>
                                <td>{{$data->courses->name}}</td>
                                <td>{{$data->created_at->format('j F Y')}}</td>
                                <td>
                                    <a href="" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#ModalEdit{{$data->id}}">Edit</a>
                                    <a href="{{route('schedule_periods.schedule_logbooks.index', $data->slug)}}" type="button" class="btn btn-primary btn-md">Add Schedule</a>
                                    <form action="{{route('schedule_periods.destroy', $data->id)}}"
                                        class="d-inline" method="POST">
                                        {{ csrf_field() }}
                                        {{method_field('delete')}}
                                        <button class="btn btn-danger ml-1">Delete</button>
                                    </form>
                                </td>
                                
                            </tr>
                            <div class="modal fade" id="ModalEdit{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Period</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"></span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('schedule_periods.update', $data->id)}}"  method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                                <label>Name Period</label>
                                                                <input type="text" name="period_name" class="form-control" value="{{$data->period_name}}">
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
                <form action="{{route('schedule_periods.store')}}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                    <label>Name Period</label>
                                    <input type="text" name="period_name"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Course</label>
                                <div class="styled-select">
                                    <select name="course_categories_id">
                                            @foreach ($course as $data)
                                                <option value="{{$data->id}}">{{$data->name}}</option>
                                            @endforeach
                                    </select>
                                </div>
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
{{-- Modal Edit schedule --}}

@endsection
