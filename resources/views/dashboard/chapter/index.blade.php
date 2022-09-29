@extends('layouts.dashboard')

@section('content')

{{-- @dd ($materi) --}}

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Chapter</li>
        </ol>
        {{-- @dd($id) --}}
        <p>
            <a href="/dashboard/chapter/create/{{$id}}" class="btn btn-secondary plus"> Add Chapter</a>
        </p>
        {{-- @dd($data) --}}
        <!-- Icon Cards-->
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
                        <div class="card-body">
                        {{$data->abstract}}
                        </div>
                        <div class="ml-3 mb-1 font-weight-normal" role="group" aria-label="Basic mixed styles example">
                            <a type="button" href="/dashboard/chapter/edit/{{$data->id}}" >Edit</a>
                            <a type="button" class="mx-2" href="/dashboard/content/{{$data->id}}">Content List</a>
                            <a type="button" class="mx-2" href="/dashboard/quiz/{{$data->id}}">Quiz</a>
                            <a type="button" href="/dashboard/chapter/delete/{{$data->id}}">Delete</a>
                        </div>
                    </div>
                </div>
            </div>  
        @endforeach
    </div>
</div>
@endsection