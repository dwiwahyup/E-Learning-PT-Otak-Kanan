@extends('layouts.dashboard')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="">Program</a>
            </li>
            <li class="breadcrumb-item active">Kompetensi</li>
        </ol>

        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Kriteria
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{-- <p><a href="{{route('program.kompetensi.create', $nama_program->slug)}}"
                    class="btn btn-secondary plus"> Add Kompetensi</a></p> --}}
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Rating</th>
                                <th>Course</th>
                                <th>Review</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Rating</th>
                                <th>Course</th>
                                <th>Review</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data as $data)

                            <tr>
                                <td>{{$data->name}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->rating}}</td>
                                <td>{{$data->users->courses->name ?? ""}}</td>
                                <td>{{$data->review}}</td>
                                <td>
                                    <div class="">
                                        <form action="{{route('testimonial.destroy', $data->id)}}" class="d-inline"
                                            method="POST">
                                            {{ csrf_field() }}
                                            {{method_field('delete')}}
                                            <button class="btn btn-danger">Delete</button>
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
