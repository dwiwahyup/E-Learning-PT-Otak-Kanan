@extends('layouts.dashboard')

@section('content')

{{-- @dd ($materi) --}}

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
            <li class="breadcrumb-item active">Chapter</li>
        </ol>
        {{-- @dd($id) --}}
        @if ($message = Session::get('success'))
            <div class="mb-10">
                <div class="alert alert-success" role="alert">
                    <p>{{$message}}</p>
            </div>
        @endif
        <p>
            <a href="/dashboard/chapter/create/{{$id}}" class="btn btn-secondary plus"> Add Chapter</a>
        </p>
        {{-- @dd($data) --}}
        <!-- Icon Cards-->
        <div class="box-general">
            <div class="header_box">
                <h2 class="d-inline-block">Course Name : {{$course_name->name}}</h2>
            </div>
            <div class="list_general">
                @foreach ($query as $index => $data)
                <div id="accordion">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between" id="headingOne">
                            <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#data{{$data->id}}" aria-expanded="true" aria-controls="collapseOne">
                            {{$index+1}}. {{$data->name}}
                            </button>
                            </h5>
                            <h5 class="mb-0">
                                <a class="btn btn-link">
                                    Total Content : {{$data->contents_count}}
                                </a>
                            </h5>
                        </div>
                
                        <div id="data{{$data->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body ml-3">
                                {{-- <p> --}}
                                    {{$data->abstract}}
                                {{-- </p> --}}
                                <div class="mt-3 font-weight-normal" role="group" aria-label="Basic mixed styles example">
                                    <a class="mr-2" href="/dashboard/chapter/edit/{{$data->id}}">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                    <a class="mr-2" href="/dashboard/content/{{$data->id}}">
                                        <i class="fa fa-list-alt" aria-hidden="true"></i> Content List</a>
                                    <a class="mr-2" href="/dashboard/quiz/{{$data->id}}">
                                        <i class="fa fa-question-circle" aria-hidden="true"></i> Quiz</a>
                                    <a href="" type="button" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
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
                                Are you sure to delete this chapter ?
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" href="/dashboard/chapter/delete/{{$data->id}}">Delete</a>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection