@extends('layouts.dashboard')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{('/dashboard')}}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{('/dashboard/coursecategory')}}">Course</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('coursecategory.chapter.index', $coursecategory->slug)}}"> {{$chapters->name}}</a>
            </li>
            <li class="breadcrumb-item active">Content</li>
        </ol>
        {{-- @dd($data) --}}
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
                <i class="fa fa-table"></i> Content Data
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <p><a href="{{route('coursecategory.chapter.content.create', ['coursecategory' => $coursecategory->slug, 'chapter' => $chapters->slug])}}" class="btn btn-secondary plus"> Add Content</a></p>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Text</th>
                                <th>Thumbnile</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Text</th>
                                <th>Thumbnile</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data as $data)
                            <tr>
                                <td>{{$data->title}}</td>
                                <td>{!! Str::words($data->text, 50) !!}</td>
                                {{-- <td>{{$data->vidio}}</td> --}}
                                <td>    
                                        @if ($data->thumbnaile_url != null)
                                            <img src="{{$data->thumbnaile_url}}" alt="" width="200px" height="100px">
                                        @else
                                        @endif
                                </td>
                                <td>
                                    {{$data->created_at}}
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('coursecategory.chapter.content.edit', ['coursecategory' => $coursecategory->slug, 'chapter' => $chapters->slug, 'content' => $data->slug])}}" class="btn btn-success btn-md">Edit</a>
                                        {{-- <a href="/dashboard/content/delete/{{$data->slug}}" class="btn btn-danger btn-md ml-2" >Delete</a> --}}
                                        <form action="{{route('coursecategory.chapter.content.destroy', ['coursecategory' => $coursecategory->id, 'chapter' => $chapters->id, 'content' => $data->id])}}" class="d-inline" method="POST">
                                            {{ csrf_field() }}
                                            {{method_field('delete')}}
                                            <button class="btn btn-danger ml-2">Delete</button>
                                        </form>
                                        <a href="/dashboard/content/preview/{{$data->slug}}" class="btn btn-danger btn-md ml-2" >Preview</a>
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