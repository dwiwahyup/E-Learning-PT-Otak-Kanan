@extends('layouts.dashboard')
@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('logbooks.index')}}">Logbooks Course</a>
            </li>
            <li class="breadcrumb-item active">Logbooks {{$course->name}} Student</li>
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
                <i class="fa fa-table"></i> Student logbook {{$course->name}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{-- <p><a href="/dashboard/logbook/create/{{ $id }}" class="btn btn-secondary plus"> Add Log
                    Book</a></p> --}}
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Total Logbooks</th>
                                <th>Logbooks waiting</th>
                                <th>Logbooks approved</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Total logbooks</th>
                                <th>Logbooks waiting</th>
                                <th>Logbooks approved</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($users as $index => $item)
                            <tr>
                                <td>{{$index + 1}}</td>
                                <td>{{$item->name}}</td>
                                <td>create {{$item->logbooks->count()}} logbooks</td>
                                        <td>{{$item->logbooks->where('status', 0)->count()}} Waiting to approved</td>
                                        <td>{{$item->logbooks->where('status', 1)->count()}} approved</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="/dashboard/logbook/students/show/{{$item->slug}}" class="btn btn-success btn-md">Detail logbooks</a>
                                    </div>
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
